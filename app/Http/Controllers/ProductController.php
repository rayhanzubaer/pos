<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $file = $request->file('image');
        $fileName = $file->getCTime() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('uploads/products', $fileName);

        Product::create([
            'image' => $path,
            'code' => $request->code,
            'description' => $request->description,
            'category_id' => $request->category,
            'stock' => $request->stock,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price
        ]);

        session()->flash('status', 'Product created successfully');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
