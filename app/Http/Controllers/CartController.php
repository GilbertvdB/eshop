<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

use Illuminate\Support\Str;

class CartController extends Controller
{
    public function cartList()
    {   
        $expirationTime = null;
        if (Auth::check()) {
            $userId = Auth::id();
            $sessionKey = $userId;
        } else {
            $sessionKey = request()->cookie('guest_session');
            // // remove
            // $sesh = session()->get('guest_session');
            // $createdAt = Carbon::parse(request()->cookie('guest_session_expire'));
            // $expiresAt = Carbon::parse($createdAt)->addMinutes(30);
            // $expirationTime = $expiresAt->diffInSeconds(Carbon::now());
        }

        $cartItems = \Cart::session($sessionKey)->getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {   
        if (Auth::check()) {
            $userId = Auth::id();
            $sessionKey = $userId;
        } else {
            $sessionKey = request()->cookie('guest_session');
        }

        \Cart::session($sessionKey)->add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Item added successfully!');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {   
        if (Auth::check()) {
            $userId = Auth::id();
            $sessionKey = $userId;
        } else {
            $sessionKey = request()->cookie('guest_session');
        }

        \Cart::session($sessionKey)->update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item updated successfully!');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {   
        if (Auth::check()) {
            $userId = Auth::id();
            $sessionKey = $userId;
        } else {
            $sessionKey = request()->cookie('guest_session');
        }

        \Cart::session($sessionKey)->remove($request->id);
        session()->flash('success', 'Item removed successfully!');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {   
        if (Auth::check()) {
            $userId = Auth::id();
            $sessionKey = $userId;
        } else {
            $sessionKey = request()->cookie('guest_session');
        }

        \Cart::session($sessionKey)->clear();

        session()->flash('success', 'Cart cleared successfully!');

        return redirect()->route('cart.list');
    }
}
