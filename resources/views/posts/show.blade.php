<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>

        <h2>Comments</h2>
        <ul class="comment-list">
            @foreach($post->comments as $comment)
                <li>
                    <p>{{ $comment->body }}</p>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('posts.comments.store', $post) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Add Comment:</label>
                <textarea name="body" id="body" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    </div>
</body>
</html>
