<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('categories.index')->with('categories', Category::all()

        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryRequest  $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        session()->flash('status', 'Category created successfully');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return null
     */
    public function show(Category $category)
    {
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryRequest  $request
     * @param  Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);

        session()->flash('status', 'Category updated successfully');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status', 'Category deleted successfully');
        return redirect()->route('categories.index');
    }
}
