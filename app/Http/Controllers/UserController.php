<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Postモデルの追加
use Illuminate\Support\Facades\Auth; // Authファサードの追加
use App\Http\Controllers\UserController;
class UserController extends Controller
{
    public function mypage()
    {
        $posts = Post::where('user_id', Auth::id())->get(); // 現在のユーザーの投稿を取得
        return view('users.mypage', compact('posts'));
    }
}

