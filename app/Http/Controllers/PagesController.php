<?php

namespace App\Http\Controllers;

use App\Models\AddBus;
use App\Models\BusRoute;
use App\Models\Category;
use App\Models\Schedule;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

    public function viewcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('viewcategory', compact('category'));
    }

    public function booking(Request $request)
    {
        $busroutes = BusRoute::orderBy('priority', 'asc')->get();
        
        $route_id = $request->input('route_id');
        $travel_date = $request->input('travel_date');
        
        if ($route_id && $travel_date) {
            $buses = AddBus::with('category', 'route', 'schedules')
                ->where('status', 'active')
                ->where('route_id', $route_id)
                ->whereHas('schedules', function ($query) use ($travel_date) {
                    $query->where('available_date', $travel_date);
                })
                ->get();

            $schedules = Schedule::where('route_id', $route_id)
                ->where('available_date', $travel_date)
                ->get();
        } else {
            $buses = AddBus::with('category', 'route', 'schedules')
                ->where('status', 'active')
                ->get();

            $schedules = Schedule::all();
        }

        $categories = Category::all();

        return view('booking', compact('busroutes', 'buses', 'categories', 'schedules', 'route_id', 'travel_date'));
    }
}
