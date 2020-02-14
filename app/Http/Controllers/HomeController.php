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

        // ログインユーザーに紐づくタスクがないか判定
        $task = $user->tasks()->doesntExist();

        // 一つもタスクがなければホームページをレスポンスする
        if ($task) {
            return view('home');
        }

        // タスクがあればタスク一覧にリダイレクトする
        return redirect()->route('tasks.index');
    }
}
