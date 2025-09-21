<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // validate() call করার দরকার নেই, FormRequest নিজেই validate করে দিবে
        $data = $request->validated();

        $category = new Category();
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->save();

        return redirect()->route('categories.index')
                        ->with('success', 'Category created successfully!');
    }
    /**
    
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->save();

        return redirect()->route('categories.index')
                        ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                        ->with('success', 'Category deleted successfully!');
    }
}
