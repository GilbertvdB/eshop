<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::all();
        
        $wish_list = app('wishlist');
        $wishlistItems = $wish_list->getContent();
        $wishlist = $wishlistItems->pluck('id')->toArray();
        // $test = $wishlistItems->pluck('id')->join(',');
        
         
        return view('product.index', compact('products'))
        ->with(['wishlist' => $wishlist]);
        // ->with(['test' => $test]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('create', Product::class);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|between:0,999.99',
            'description' => 'required|string|max:255',
            'image' => 'required|string|max:255'
        ]);
    
        $new_product = Product::create($validatedData);
 
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {   
        $wish_list = app('wishlist');
        $wishlistItems = $wish_list->getContent();
        $wishlist = $wishlistItems->pluck('id')->toArray();

        return view('product.show')
        ->with('product', $product)
        ->with('wishlist', $wishlist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
