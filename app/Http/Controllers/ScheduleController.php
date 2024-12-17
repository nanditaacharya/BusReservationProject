<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\AddBus;
use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'bus_id' => 'required|exists:add_buses,id',
            'available_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'status' => 'required|in:active,inactive',
        ]);

        Schedule::create($validated);

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
        $validated = $request->validate([
            'bus_id' => 'required|exists:add_buses,id',
            'available_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'status' => 'required|in:active,inactive',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($validated);

        return redirect()->route('schedule.index')->with('success', 'Schedule updated successfully!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully!');
    }
}
