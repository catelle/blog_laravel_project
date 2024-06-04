<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>
        @include('posts._form', ['post' => $post, 'route' => route('posts.update', $post), 'method' => 'PUT'])
    </div>
</body>
</html>
