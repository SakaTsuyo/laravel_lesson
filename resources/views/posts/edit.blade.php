@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body">{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
