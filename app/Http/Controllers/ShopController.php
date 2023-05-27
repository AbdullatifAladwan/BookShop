<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;



class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('Products')->get();
        $product = Products::with('categories')->get();
        return view('shop', compact('product','categories'));
    } 
    public function filter(Request $request, $id)
    {
        // Retrieve the selected category ID from the request
        $categoryId = $request->input('id');

        $categories = Category::withCount('Products')->get();
        $product = Products::with('categories')->whereHas('categories', function ($query) use ($categoryId) {
        $query->where('categories.id', $categoryId);
    })->get();
        return view('shop-filter', compact('product','categories'));
    } 
    public function addToCart(Request $request)
    {
    $name = $request->input('name');
    $quantity = $request->input('quantity');
    $price = $request->input('price');
    
    $cartItems = Session::get('cartItems', []);
    $cartItems[] = [
      'name' => $name,
      'quantity' => $quantity,
      'price' => $price
    ];
    Session::put('cartItems', $cartItems);
    
    $subtotal = 0;
    foreach ($cartItems as $item) {
      $subtotal += $item['quantity'] * $item['price'];
    }
    
    $cartItemCount = count($cartItems);
    Session::put('subtotal', $subtotal);

    return response()->json(['success', 'cartItemCount' => $cartItemCount, ]);
    
        
    }
    public function cart()
    {

        return view('checkout');
    } 

}
