<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        // Validate the user request,
        $request->validate(['name' => 'required']);

        Category::create(['name' => $request->name ]);

        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $request->validate(['name' => 'required']);

        $category->update(['name' => $request->name]);

        return to_route('categories.index');
    }

    public function show(Category $category)
    {
        $discussions = $category->discussions;

        return view('discussions.index', compact('discussions'));
    }
}
