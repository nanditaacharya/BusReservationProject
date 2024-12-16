<?php

namespace App\Http\Controllers;

use App\Models\AddBus;
use App\Models\BusRoute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddBusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $buses = AddBus::with('category', 'route')->paginate(10);
        return view('addbus.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $routes = BusRoute::all();
        $categories = Category::all();
        return view('addbus.create', compact('routes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'bus_number' => 'required|string|max:255|unique:add_buses',
            'category_id' => 'required|exists:categories,id',
            'route_id' => 'required|exists:bus_routes,id',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'driver_name' => 'required|string|max:255',
            'driver_license' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images/buses', $fileName, 'public');
            $validated['image'] = $fileName;
        }

        AddBus::create($validated);

        return redirect()->route('addbus.index')->with('success', 'Bus added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $bus = AddBus::findOrFail($id);
        $routes = BusRoute::all();
        $categories = Category::all();
        return view('addbus.edit', compact('bus', 'routes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $bus = AddBus::findOrFail($id);

        $validated = $request->validate([
            'bus_number' => 'required|string|max:255|unique:add_buses,bus_number,' . $bus->id,
            'category_id' => 'required|exists:categories,id',
            'route_id' => 'required|exists:bus_routes,id',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'driver_name' => 'required|string|max:255',
            'driver_license' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            if ($bus->image && Storage::disk('public')->exists('images/buses/' . $bus->image)) {
                Storage::disk('public')->delete('images/buses/' . $bus->image);
            }
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images/buses', $fileName, 'public');
            $validated['image'] = $fileName;
        }

        $bus->update($validated);

        return redirect()->route('addbus.index')->with('success', 'Bus updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $bus = AddBus::findOrFail($id);

        if ($bus->image && Storage::disk('public')->exists('images/buses/' . $bus->image)) {
            Storage::disk('public')->delete('images/buses/' . $bus->image);
        }

        $bus->delete();

        return redirect()->route('addbus.index')->with('success', 'Bus deleted successfully!');
    }
}
