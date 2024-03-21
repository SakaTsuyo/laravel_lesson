@extends('layouts.app')

@section('content')
<div class="container">
    <div class="create">
        <a href="{{route('posts.create')}}">create</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @foreach ($posts as $post)
                        <div class="post">
                            <p>{{ $post->body }}</p>
                            <a href="{{ route('posts.show', $post->id) }}">View</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
