<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Posts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        <ul class="post-list">
            @foreach($posts as $post)
                <li>
                    <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                    <p>{{ $post->body }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
