<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ...

    /**
     * Process the payment for an order.
     *
     * @param  Request  $request
     * @param  int  $orderId
     * @return \Illuminate\Http\Response
     */
    public function processPayment(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        // Get the Stripe token from the request
        $token = $request->input('stripeToken');

        // Charge the order using Stripe
        $order->charge($token);

        // Redirect or return response as needed
        return redirect()->route('order.confirmation', ['order' => $order]);
    }
}
