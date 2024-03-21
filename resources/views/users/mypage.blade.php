@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>
                <div class="card-body">
                    <h5>プロフィール</h5>
                    <p>名前: {{ Auth::user()->name }}</p>
                    <p>メール: {{ Auth::user()->email }}</p>

                    <h5>投稿一覧</h5>
                    @if($posts->isNotEmpty())
                        @foreach ($posts as $post)
                            <div class="post">
                                <p>{{ $post->body }}</p>
                                <p>投稿日時: {{ $post->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>投稿はありません。</p>
                    @endif
                </div>
                <a href="{{ route('posts.index') }}">投稿一覧を見る</a>
            </div>
        </div>
    </div>
</div>
@endsection

