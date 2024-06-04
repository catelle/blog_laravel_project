<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Post</h1>
        @include('comments._form', ['post' => new App\Models\Post, 'route' => route('posts.store'), 'method' => 'POST'])
    </div>
</body>
</html>
