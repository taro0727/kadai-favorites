<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        //ユーザー一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        //ユーザー一覧ビューで表示
        return view('users.index',[
            'users' => $users,
            ]);
    }
    
    public function show($id)
    {
        //idの値でユーザ検索、取得
        $user = User::findOrFail($id);
        
        //ユーザ詳細ビューでそれを表示
        return view('users.show',[
            'user' => $user,
            ]);
    }
}
