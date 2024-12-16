<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
{
    // Fetch categories along with related bus route
    $categories = Category::all();

    return view('category.index', compact('categories'));
}
    // Show the form for creating a new category
    public function create()
    {
        return view('category.create');
    }

    // Store a newly created category
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'types' => 'required|string|max:255',
            'route_name' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Create a new category instance
        $category = new Category();
        $category->name = $request->name;
        $category->types = $request->types;
        $category->route_name = $request->route_name;

        // Handle the file upload for category picture
        if ($request->hasFile('picture')) {
            // Generate a unique filename
            $fileName = time() . '_' . $request->file('picture')->getClientOriginalName();
            // Move the uploaded file to the 'images/categories' directory
            $request->file('picture')->move(public_path('images/categories'), $fileName);
            // Store the filename in the 'picture' column
            $category->picture = $fileName;
        }

        // Save the category to the database
        $category->save();

        // Redirect back to the category index page with a success message
        return redirect()->route('category.index')->with('success', 'Category added successfully!');
    }

    // Show the form for editing an existing category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    // Update the specified category in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'types' => 'required|string|max:255',
            'route_name' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->types = $request->types;
        $category->route_name = $request->route_name;

        // Handle the file upload for category picture
        if ($request->hasFile('picture')) {
            // Generate a unique filename
            $fileName = time() . '_' . $request->file('picture')->getClientOriginalName();
            // Move the uploaded file to the 'images/categories' directory
            $request->file('picture')->move(public_path('images/categories'), $fileName);
            // Store the new filename in the 'picture' column
            $category->picture = $fileName;
        }

        // Save the updated category
        $category->save();

        // Redirect back to the category index page with a success message
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    // Delete the specified category from the database
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // Delete the category's picture file if it exists
        if ($category->picture) {
            unlink(public_path('images/categories/' . $category->picture));
        }

        // Delete the category from the database
        $category->delete();

        // Redirect back to the category index page with a success message
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
