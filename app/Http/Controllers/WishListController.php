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
        return view('wishlist', compact('cartItems'));
    }

    public function add()
    {
        $wish_list = app('wishlist');
        $id = request('id');
        $name = request('name');
        $price = request('price');
        $qty = request('qty');

        $wish_list->add($id, $name, $price, $qty, array());
        
        return redirect(route('wishlist.list'));
    }

    public function delete($id)
    {
        $wish_list = app('wishlist');

        $wish_list->remove($id);

        return back();

    }

    public function addToCart()
    {
        $wish_list = app('wishlist');
        $id = request('id');
        $name = request('name');
        $price = request('price');
        $qty = request('qty');

        $wish_list->add($id, $name, $price, $qty, array());

        session()->flash('success', 'Product is Added to Wishlist Successfully !');

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

        session()->flash('success', 'Item Wishlist is Updated Successfully !');

        return redirect()->route('wishlist.list');
    }

    public function removeCart(Request $request)
    {
        $wish_list = app('wishlist');
        $wish_list->remove($request->id);

        session()->flash('success', 'Item Wishlist Removed Successfully !');

        // return redirect()->route('wishlist.list');
        return back();
    }

    public function clearAllCart()
    {
        $wish_list = app('wishlist');
        $wish_list->clear();

        session()->flash('success', 'All Item Wishlist Cleared Successfully !');

        return redirect()->route('wishlist.list');
    }
}
