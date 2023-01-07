<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Contracts\OrderContract;
use App\Classes\PaymentService;
use App\Http\Controllers\Controller;
use Carbon\Exceptions\BadComparisonUnitException;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $orderRepository;

    protected $payMent;

    public function __construct(OrderContract $orderRepository, PaymentService $payMent)
    {
        $this->payMent = $payMent;
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('checkout.checkout');
    }

    public function placeOrder(Request $request)
    {
        // Before storing the order we should implement the
        // request validation which I leave it to you
        $order = $this->orderRepository->storeOrderDetails($request->all());

        // dd($order);

        // You can add more control here to handle if the order
        // is not stored properly
        if ($order) {
            // $this->payMent->processPayment($order);

            $order = $this->complete($order);

            return view('checkout.success', compact('order'));
        }
        else {
            return redirect()->back()->with('message','Order not placed');
        }
    }


    public function complete($request)
    {   
        // $paymentId = $request->input('paymentId');
        // $payerId = $request->input('PayerID');

        $paymentId = $request->order_number;
        $payerId = $request->user_id;   

        $status = $this->payMent->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayMent -'.$status['salesId'];
        $order->save();

        \Cart::session($payerId)->clear();
        
        // return redirect()->route('success', compact('order'));

        return $order;
        
    }
}