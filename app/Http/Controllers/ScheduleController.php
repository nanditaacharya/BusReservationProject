<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\AddBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('bus')->get();
        return view('schedule.index', compact('schedules'));
    }

    public function create()
    {
        $buses = AddBus::all();
        return view('schedule.create', compact('buses'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bus_id' => 'required|exists:add_buses,id',
            'available_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'status' => 'required|in:active,inactive',
        ]);

        $validator->after(function ($validator) use ($request) {
            $existingSchedule = Schedule::where('bus_id', $request->bus_id)
                ->whereDate('available_date', $request->available_date)
                ->whereTime('departure_time', $request->departure_time)
                ->first();

            if ($existingSchedule) {
                $validator->errors()->add('bus_id', 'This bus is already scheduled at this time and date.');
            }

            $gapMinutes = 30;
            $routeDuration = 60;
            $minTimeGap = $routeDuration + $gapMinutes;

            $overlappingSchedule = Schedule::where('bus_id', $request->bus_id)
                ->whereDate('available_date', $request->available_date)
                ->where(function ($query) use ($request, $minTimeGap) {
                    $query->whereBetween('departure_time', [
                        $this->adjustTime($request->departure_time, -$minTimeGap),
                        $this->adjustTime($request->departure_time, $minTimeGap)
                    ]);
                })
                ->exists();

            if ($overlappingSchedule) {
                $validator->errors()->add('departure_time', 'There should be a minimum ' . $minTimeGap . ' minutes gap between schedules.');
            }
        });

        if ($validator->fails()) {
            return redirect()->route('schedule.create')
                ->withErrors($validator)
                ->withInput();
        }

        Schedule::create($request->all());

        return redirect()->route('schedule.index')->with('success', 'Schedule created successfully!');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $buses = AddBus::all();
        return view('schedule.edit', compact('schedule', 'buses'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bus_id' => 'required|exists:add_buses,id',
            'available_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'status' => 'required|in:active,inactive',
        ]);

        $validator->after(function ($validator) use ($request, $id) {
            $existingSchedule = Schedule::where('bus_id', $request->bus_id)
                ->whereDate('available_date', $request->available_date)
                ->whereTime('departure_time', $request->departure_time)
                ->where('id', '!=', $id)
                ->first();

            if ($existingSchedule) {
                $validator->errors()->add('bus_id', 'This bus is already scheduled at this time and date.');
            }

            $gapMinutes = 30;
            $routeDuration = 60;
            $minTimeGap = $routeDuration + $gapMinutes;

            $overlappingSchedule = Schedule::where('bus_id', $request->bus_id)
                ->whereDate('available_date', $request->available_date)
                ->where(function ($query) use ($request, $minTimeGap) {
                    $query->whereBetween('departure_time', [
                        $this->adjustTime($request->departure_time, -$minTimeGap),
                        $this->adjustTime($request->departure_time, $minTimeGap)
                    ]);
                })
                ->exists();

            if ($overlappingSchedule) {
                $validator->errors()->add('departure_time', 'There should be a minimum ' . $minTimeGap . ' minutes gap between schedules.');
            }
        });

        if ($validator->fails()) {
            return redirect()->route('schedule.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());

        return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully!');
    }

    private function adjustTime($time, $minutes)
    {
        $dateTime = \Carbon\Carbon::createFromFormat('H:i', $time);
        return $dateTime->addMinutes($minutes)->format('H:i');
    }
}
