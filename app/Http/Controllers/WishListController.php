<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function cartList()
    {   
        $wish_list = app('wishlist');

        // $data = $wish_list->getContent();
        // return view('test')->with('info', $data);
        
        $cartItems = $wish_list->getContent();
        return view('wishlist', compact('cartItems'))->with('wishlist', $wish_list);
    }

    public function addToCart()
    {
        $wish_list = app('wishlist');
        $id = request('id');
        $name = request('name');
        $price = request('price');
        $qty = request('qty');
        $image = request('image');
        $attributes = array('image' => $image);

        $wish_list->add($id, $name, $price, $qty, $attributes);

        session()->flash('success', 'Item added successfully!');

        // return redirect()->route('wishlist.list');
        return back();
    }

    public function updateCart(Request $request)
    {
       $wish_list = app('wishlist');
        $id = request('id');
        $qty = request('qty');

        // $name = request('name');
        // $price = request('price');
        // $wish_list->update($id, array('name'=> $name, 
        //                               'price' => $price, 
        //                               'quantity' => $qty));

        $wish_list->update($id, array('quantity' => $qty));

        session()->flash('success', 'Item updated successfully!');

        return redirect()->route('wishlist.list');
    }

    public function removeCart(Request $request)
    {
        $wish_list = app('wishlist');
        $wish_list->remove($request->id);

        session()->flash('success', 'Item removed successfully!');

        // return redirect()->route('wishlist.list');
        return back();
    }

    public function clearAllCart()
    {
        $wish_list = app('wishlist');
        $wish_list->clear();

        session()->flash('success', 'Wishlist cleared successfully!');

        return redirect()->route('wishlist.list');
    }
}
