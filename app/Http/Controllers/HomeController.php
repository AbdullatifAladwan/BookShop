<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Products;
use App\Models\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::all();
        $product = Products::with('categories')->get();
        return view('home', compact('product','post'));
    } 
    public function show($id)
    {
        $product = Products::with('categories')->find($id);
      
        return view('single-product', compact('product'));
    
    }
    public function Contact()
    {
        return view('Contact');
    }
    public function store(Request $request)
    {

    // Create a new ContactUs record
    $contactUs = ContactUs::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message')
    ]);
    // Redirect back with success message
    return redirect()->back()->with('success', 'Contact Us  submitted successfully!');
}
    
}
