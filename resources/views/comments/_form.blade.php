<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea name="body" id="body" class="form-control" required>{{ old('body', $post->body) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
