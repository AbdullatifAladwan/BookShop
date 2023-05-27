<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;


class PostController extends Controller
{
    public function index()
    {
        $post=Post::all();
        return view('blog', compact('post'));
    } 
    public function show($id)
    {
        $allpost=Post::all();
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get(); // Get all comments for the specific post
        $commentData = [];
    
        foreach ($comments as $comment) {
            $user = User::find($comment->user_id);
            $username = $user->name;
            $photo =$user->photo;
    
            // Add comment data to the array
            $commentData[] = [
                'username' => $username,
                'photo' => $photo,
                'comment' => $comment->comment
            ];
        }
    
        $commentCount = $comments->count(); // Get the count of comments
    
        return view('single-blog', compact('post', 'commentData', 'commentCount','allpost'));
    
    }
    public function store(Request $request)
    {
        // Validate the request data
    $request->validate([
        'user_id' => 'required',
        'post_id' => 'required',
        'comment' => 'required',
    ]);

    // Create a new comment
    $comment = new Comment();
    $comment->user_id = $request->input('user_id');
    $comment->post_id = $request->input('post_id');
    $comment->comment = $request->input('comment');
    $comment->save();

    // Get the authenticated user's data
    $user = auth()->user();
    $username = $user->name; // Change this to the actual attribute name for the username in your User model
    $userPhoto = $user->photo; // Change this to the actual attribute name for the photo in your User model

    // Prepare the response data
    $responseData = [
        'username' => $username,
        'userphoto' => $userPhoto,
        'comment' => $comment->comment,
    ];

    // Return the response data
    return response()->json($responseData);
}


}
