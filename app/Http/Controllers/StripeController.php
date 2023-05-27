<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $amount = Session::get('subtotal') * 100;
            $charge = Charge::create([
                'amount' =>  $amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'test',
            ]);
            $cartItems = Session::get('cartItems', []);

            // Extract the product names and quantities from the cart items
            $products = [];
            foreach ($cartItems as $item) {
                $products[] = [
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                ];
            }
                    // Retrieve form input values
            $name = $request->input('name');
            $phoneNumber = $request->input('number');
            $address = $request->input('add1');
            $zipCode = $request->input('zip');
            $orderNote = $request->input('message');
            Session::forget('cartItems');
            Session::forget('subtotal');


            //  dd($orderNote,$zipCode,$address);
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->products = json_encode($products);
            $order->subtotal = $amount;
            $order->name = $name;
            $order->phone_number = $phoneNumber;
            $order->address = $address;
            $order->zip_code = $zipCode;
            $order->order_note = $orderNote;
            $order->save();

            
            

            return redirect()->back()->with('success', 'Payment successful.');
       
    }
}

