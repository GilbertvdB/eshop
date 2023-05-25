<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        
         
        return view('site.pages.homepage', compact('products'))
        ->with(['wishlist' => $wishlist]);
    }
}
