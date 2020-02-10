<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();

        // ログインユーザーに紐づくフォルダを一つ取得する
        $task = $user->tasks()->first();

        // まだ一つもタスクを作っていなければホームページをレスポンスする
        // if (is_null($task)) {
        //     return view('home');
        // }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index');
    }
}
