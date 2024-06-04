<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Comments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .post-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .post-header h1 {
            margin: 0;
        }

        .post-header p {
            color: #555;
        }

        .comments {
            margin: 2rem 0;
            padding-left: 1rem;
            border-left: 3px solid #ddd;
        }

        .comment {
            margin: 0.5rem 0;
        }

        .comment .author {
            color: #333;
            font-weight: bold;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 2rem;
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="/dashboard">Dashboard</a>
        <a href="/profile">Profile</a>
        <a href="/settings">Settings</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: white; cursor: pointer; font-size: 1rem;">Logout</button>
        </form>
    </div>

    <div class="container">
        <div class="post-header">
            <h1>{{ $post->title }}</h1>
            <p>Posted by: {{ $post->user->name }} ({{ $post->comments_count }} comments)</p>
          
        <p>{{ $post->body }}</p>

        </div>
        

        <div class="comments">
        </div>
        <form action="{{ route('posts.comments.store', $post) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Add Comment:</label>
                <textarea name="body" id="body" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
       
    
            @foreach($post->comments as $comment)
                <div class="comment">
                    <p class="author">{{ $comment->user->name }} commented:</p>
                    <p>{{ $comment->body }}</p>
                </div>
            @endforeach
            </div> 
       
</body>
</html>
