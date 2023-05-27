<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        // Validate input data
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        // Create a new comment
        $comment = new Comment;
        $comment->user_id = auth()->user()->id; // Assuming the comments are associated with authenticated users
        $comment->post_id = $postId;
        $comment->comment = $validatedData['comment'];
        $comment->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Comment created successfully!');
    }

    // Add other methods for handling update, delete, and show operations for comments as needed
}