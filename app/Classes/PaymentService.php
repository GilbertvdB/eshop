<?php

namespace App\Classes;

use App\Models\Order;
use App\Http\Controllers\CheckoutController;

class PaymentService
{
    protected $payMent;

    public function processPayment($order)
    {
        // Add shipping amount if you want to charge for shipping
        $shipping = sprintf('%0.2f', 0);
        
        // Add any tax amount if you want to apply any tax rule
        $tax = sprintf('%0.2f', 0);

        $paymentId = $order->order_number;
        $payerId = $order->user_id;

        // Set the base approval URL
        $approvalUrl = route('checkout.payment.complete');

        // Add the payment ID and payer ID as query parameters to the approval URL
        $approvalUrl .= '?paymentId=' . $paymentId . '&PayerID=' . $payerId;

        // header("Location: {$approvalUrl}"); // open Yes or Cancel page
        exit;
        
        // return redirect()->action('CheckoutController@complete', ['request' => $order]);
        // return redirect()->route('checkout.payment.complete')->with(['request' => $order]);

        
    }

    public function completePayment($paymentId, $payerId)
    {   
        $transaction = Order::where('order_number', $paymentId)->where('user_id', $payerId)
        ->first();;

        $result = 'approved';

        if ($result === 'approved') {
            $invoiceId = $transaction->order_number;

            $saleId = $transaction->user_id;

            $transactionData = ['salesId' => $saleId, 'invoiceId' => $invoiceId];

            return $transactionData;
        } 
        else {
            echo "<h3>".$result."</h3>";
            var_dump($result);
            exit(1);
        }
    }


   
}