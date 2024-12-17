<?php

namespace App\Http\Controllers;

use App\Models\AddBus;
use App\Models\BusRoute;
use App\Models\Category;
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
        
        if ($route_id) {
            $buses = AddBus::with('category', 'route')
                ->where('status', 'active')
                ->where('route_id', $route_id)
                ->get();
        } else {
            $buses = AddBus::with('category', 'route')
                ->where('status', 'active')
                ->get();
        }

        $categories = Category::all();
        return view('booking', compact('busroutes', 'buses', 'categories'));
    }
}
