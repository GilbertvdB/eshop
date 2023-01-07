<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getOrders()
    {
        $orders = auth()->user()->orders;

        return view('account.orders', compact('orders'));
    }
}