<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreProductFormRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $search = $request->query('search');

        $products = Product::where('sku', 'like', '%'.$search.'%')
        ->orWhere('name', 'like', '%'.$search.'%')
        ->paginate(10);

        $pageTitle = 'Products';
        $pageDescription = 'List of all products';

        return view('admin.products.index', compact('products', 'pageTitle', 'pageDescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        $pageTitle = 'Products';
        $pageDescription = 'Create products';

        return view('admin.products.create', compact('brands', 'categories', 'pageTitle', 'pageDescription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductFormRequest $request)
    {
        $params = $request->validated();

        $productId = DB::table('products')->insertGetId($params);

        $product = Product::find($productId);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Error occurred while creating product.');
        }

        $categories = $request->input('categories', []);
        $product->categories()->sync($categories);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {   
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        $pageTitle = 'Products';
        $pageDescription = 'Edit Brand: ' . $product->name;

        return view('admin.products.edit', compact('product', 'brands', 'categories', 'pageTitle', 'pageDescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductFormRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
            'weight' => $request->weight,
            'description' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
            'featured' => $request->has('featured') ? 1 : 0,
        ]);

        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
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
