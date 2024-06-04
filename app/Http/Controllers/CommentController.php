<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.show', $post);
    }
}
