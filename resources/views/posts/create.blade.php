@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
