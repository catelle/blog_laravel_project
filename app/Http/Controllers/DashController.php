<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
          $posts = Post::with(['user', 'comments' => function($query) {
                                $query->orderBy('created_at', 'desc');
                            }])
                         ->withCount('comments')
                         ->get()
                         ->map(function($post) {
                             $post->latest_comment = $post->comments->first();
                             return $post;
                         });
    
            return view('dashboard', compact('posts'));
        }
    
        public function showComments($postId)
        {
            $post = Post::with(['user', 'comments' => function($query) {
                                $query->orderBy('created_at', 'desc');
                            }])->findOrFail($postId);
            return view('comments', compact('post'));
        }
}
