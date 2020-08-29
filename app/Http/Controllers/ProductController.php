<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
     * @param Product $product
     * @return null
     */
    public function show(Product $product)
    {
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'code' => $request->code,
            'description' => $request->description,
            'category_id' => $request->category,
            'stock' => $request->stock,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price
        ]);

        $file = $request->file('image');
        if (!is_null($file)) {
            $fileName = $file->getCTime() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/products', $fileName);

            $product->update([
                'image' => $path
            ]);
        }

        Session::flash('status', 'Product update successfully');
        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('status', 'Product deleted successfully');
        return Redirect::route('products.index');
    }
}
