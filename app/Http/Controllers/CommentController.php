<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment; // Assuming Comment model exists
use App\Models\Post;    // Assuming Post model exists

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $comments = $post->comments()->get();
        return view("posts.index",compact("comments","post"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post){
        return view("posts.create",compact("post"));
        // Show the form for creating a new comment
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post){
    $request->validate([
        'content' => 'required', // Assuming 'content' is the field for comment content
    ]);

    $post->comments()->create([
        'content' => $request->input('content'),
    ]);

    return redirect()->route('posts.comments.index', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post,Comment $comment)
    {
        return view('posts.show',compact("comment","post"));
    }
    public function edit(Post $post,Comment $comment)
    {
    abort_if($comment->post_id != $post->id, 404);
    return view('posts.edit',compact('post','comment'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required', // Assuming 'content' is the field for comment content
        ]);

        $comment->content = $request->input('content');
        $comment->save();        

        return redirect()->route('posts.comments.index', ['post' => $comment->post_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $post_id = $comment->post_id;
        $comment->delete();

        return redirect()->route('posts.comments.index', ['post' => $post_id]);
    }
}
