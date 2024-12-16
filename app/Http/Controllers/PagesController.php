<?php

namespace App\Http\Controllers;

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
}
