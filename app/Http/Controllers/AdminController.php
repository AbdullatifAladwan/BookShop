<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ContactUs;
use App\Models\Products;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']); // Apply 'auth' and 'admin' middleware
    }

    public function index()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $charges = Charge::all();
        $userCount = User::where('is_admin', 0)->count();
        $productCount = Products::count();
        $orderCount = Order::count();
        $orders = Order::all();
        $totalSubtota = Order::sum('subtotal');
        $totalSubtotal=substr($totalSubtota, 0, 3);
        foreach ($orders as $order) {
        $order->products = json_decode($order->products);
        }
        return view('admin.home',compact('userCount','productCount','orderCount','orders','totalSubtotal','charges'));
    }
    public function order()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
        $order->products = json_decode($order->products);
        }
        return view('admin.order',compact('orders'));
    }
    public function users()
    {
        $users = User::where('is_admin', 0)->get();

        return view('admin.users',compact('users'));
    }
    /////////////contact//////////////////
    public function contact()
    {
        $ContactUs = ContactUs::all();
        return view('admin.contact', compact('ContactUs'));
    }
    public function deleteContact(Request $request)
    {
        // Get Contact ID from request
        $contactId = $request->input('postId');
    
        // Perform delete operation
        $con = ContactUs::find($contactId);
        if ($con) {
            $con->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    /////////////////////////////////////////////////////
    public function post()
    {
        $post = Post::all();
        return view('admin.post', compact('post'));
    }
  
    public function storepost(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'addtitle' => 'required',
            'adddescription' => 'required',
            'addphoto' => 'required',
        ]);
    
        // Upload photo file and get file path
        $photo = $request->file('addphoto');
        $photoPath = $photo->move('public/photos', $photo->getClientOriginalName());
        $photoUrl = asset('public/photos/' . $photo->getClientOriginalName());
    
        // Create a new post
        $post = new Post;
        $post->title = $validatedData['addtitle'];
        $post->description = $validatedData['adddescription'];
        $post->photo = $photoUrl;
        $post->save();
    
        return redirect()->back()->with('success', 'Add Post successfully!');    }
     // Update Post
     public function updatePost(Request $request)
     {
         // Validate input data
         $validatedData = $request->validate([
             'postId' => 'required|integer',
             'title' => 'required',
             'description' => 'required',
             'photo' => 'nullable|image|max:2048',
         ]);
 
         // Get post by ID
         $post = Post::find($validatedData['postId']);
 
         if (!$post) {
             return response()->json(['success' => false, 'message' => 'Post not found.']);
         }
 
         // Update post data
         $post->title = $validatedData['title'];
         $post->description = $validatedData['description'];
 
         // Check if new photo is uploaded
         if ($request->hasFile('photo')) {
             $photo = $request->file('photo');
             $photoPath = $photo->move('public/photos', $photo->getClientOriginalName());
             $photoUrl = asset('public/photos/' . $photo->getClientOriginalName());
             $post->photo = $photoUrl;
         }
 
         $post->save();
 
         return response()->json(['success' => true, 'message' => 'Post updated successfully!', 'photo' => $post->photo]);
     }
     public function deletePost(Request $request)
    {
    // Get post ID from request
    $postId = $request->input('postId');

    // Perform delete operation
    $post = Post::find($postId);
    if ($post) {
        $post->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false]);
    }
    }
    ////////////////////////////prodact//////////////////
    public function prodact()
    {
        $prodact = Products::all();
        $categories = Category::all();

        return view('admin.prodact', compact('prodact','categories'));
    }
  
    public function storeproduct(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'addname' => 'required',
            'adddescription' => 'required',
            'addprice' => 'required',
            'addphoto' => 'required',
            'addcategory_id' => 'required',
        ]);
    
        // Upload photo file and get file path
        $photo = $request->file('addphoto');
        $photoPath = $photo->move('public/product', $photo->getClientOriginalName());
        $photoUrl = asset('public/product/' . $photo->getClientOriginalName());
    
        // Create a new post
        $Prodact = new Products();
        $Prodact->name = $validatedData['addname'];
        $Prodact->description = $validatedData['adddescription'];
        $Prodact->price = $validatedData['addprice'];
        $Prodact->photo = $photoUrl;
        $Prodact->category_id = $validatedData['addcategory_id'];
        $Prodact->save();
    
        // Return success response
        return redirect()->back()->with('success', 'Add Products successfully!');    
    }
    
    // Update Product
    public function updateproduct(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'postId' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'photo' => 'nullable|image|max:2048',
            'category_id' => 'required',
        ]);
    
        $prodact = Products::find($validatedData['postId']);
    
        if (!$prodact) {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }
    
        // Update product data
        $prodact->name = $validatedData['name'];
        $prodact->description = $validatedData['description'];
        $prodact->price = $validatedData['price'];
        $prodact->category_id = $validatedData['category_id'];
    
        // Check if new photo is uploaded
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->move('public/product', $photo->getClientOriginalName());
            $photoUrl = asset('public/product/' . $photo->getClientOriginalName());
            $prodact->photo = $photoUrl;
        }
    
        $prodact->save();
        return response()->json(['success' => true, 'message' => 'Product updated successfully!', 'photo' => $prodact->photo]);
    }
    
    public function deleteproduct(Request $request)
    {
        // Get post ID from request
        $productid = $request->input('postId');
    
        // Perform delete operation
        $prodact = Products::find($productid);
        if ($prodact) {
            $prodact->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    
   
    
}
