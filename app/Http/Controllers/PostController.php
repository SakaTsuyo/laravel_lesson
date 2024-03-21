<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);
    
        // CSRFトークンを除外してデータを保存
        $input = $request->except('_token');
        $input['user_id']= Auth::id();
        Post::create($input);
    
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }
    
    public function show(Post $post)
{
    return view('posts.show', compact('post')); // 特定の投稿を表示するビューにデータを渡す
}
public function edit(Post $post)
{
    return view('posts.edit', compact('post')); // 編集用フォームを表示するビューに投稿データを渡す
}
public function update(Request $request, Post $post)
{
    $request->validate([
        'body' => 'required', // 必須項目としてbodyを指定
    ]);

    $post->update($request->all()); // 指定された投稿をリクエストデータで更新

    return redirect()->route('posts.index') // 投稿一覧ページへリダイレクト
        ->with('success', 'Post updated successfully.');
}
public function destroy(Post $post)
{
    $post->delete(); // 指定された投稿を削除

    return redirect()->route('posts.index') // 投稿一覧ページへリダイレクト
        ->with('success', 'Post deleted successfully.');
}

}
