<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Dashboard</title>
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

        .welcome {
            text-align: center;
            margin-bottom: 2rem;
        }

        .welcome h1 {
            margin: 0;
        }

        .welcome p {
            color: #555;
        }

        .posts {
            margin: 2rem 0;
        }

        .post {
            border-bottom: 1px solid #ddd;
            padding: 1rem 0;
        }

        .post h2 {
            margin: 0 0 0.5rem;
        }

        .post p {
            margin: 0;
            color: #777;
        }

        .post .author {
            color: #333;
            font-weight: bold;
        }

        .comments {
            margin-top: 1rem;
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

        .logout-form {
            text-align: center;
            margin-top: 2rem;
        }

        .logout-form button {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
        }

        .logout-form button:hover {
            background-color: #ff4500;
        }

        .more-comments {
            margin-top: 1rem;
        }

        .more-comments a {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .more-comments a:hover {
            text-decoration: underline;
        }
    </style>
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
        <div class="welcome">
            <h1>Welcome, {{ auth()->user()->name }}</h1>
            <p>Here are your latest blog posts</p>
        </div>

        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    <h2><a href="{{ route('posts.comments', $post) }}">{{ $post->title }}</a></h2>
                    <p class="author">Posted by: {{ $post->user->name }} ({{ $post->comments_count }} comments)</p>
                    <p>{{ $post->body }}</p>
                    
                    <div class="comments">
                        @if($post->latest_comment)
                            <div class="comment">
                                <p class="author">{{ $post->latest_comment->user->name }} commented:</p>
                                <p>{{ $post->latest_comment->body }}</p>
                            </div>
                        @endif
                        <div class="more-comments">
                            <a href="{{ route('posts.comments', $post->id) }}">More comments</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="logout-form">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
