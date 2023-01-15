<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    public function generateSessionKey(Request $request)
    {
        // Generate a unique session key
        $sessionKey = Str::random(40);

        // Add the session key to the cart instance
        $cart = \Cart::session($sessionKey);

        // Set the session key as a cookie on the visitor's device
        $minutes = 10;
        // $response = Cookie::queue(Cookie::make('guest_session', 'some_value', $minutes));
        // $response = new \Illuminate\Http\Response('Set Cookie');
        // $response = new \Illuminate\Http\JsonResponse();
        $response = Redirect::back();
        $response->withCookie(Cookie::make('guest_session', $sessionKey, $minutes));
        return $response;
    }
}