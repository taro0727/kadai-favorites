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
        // ユーザの投稿一覧を作成日時の降順で取得
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        //ユーザ詳細ビューでそれを表示
        return view('users.show',[
            'user' => $user,
            'microposts' => $microposts,
            ]);
    }
    
    /**
     *ユーザのフォロー一覧ページを表示するアクション
     * 
     * @param $id ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followings($id)
    {
        //idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);
        
        //フォロー一覧ビューでそれらを取得
        return view('users.followings',[
            'user' => $user,
            'users' => $followings
            ]);
    }
    
    /**
     * ユーザのフォロワー一覧ページを取得するアクション
     * 
     * @param $id ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        //idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        //ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);
        
        
        //フォロワー一覧ビューでそれらを表示
        return view('users.followers',[
            'user' => $user,
            'users' => $followers,
            ]);
    }


    /**
     * ユーザのお気に入りを取得
     */
    public function favorites($id)
    {
      //idの値でを検索して取得
     $user = User::findOrFail($id);
     
     //関係するモデルの件数をロード
     $user->loadRelationshipCounts();
     
     //ユーザのお気に入り一覧を取得
     $favorites = $user->favorites()->paginate(10);
     
     //お気に入り一覧ビューでそれらを表示する
      return view('users.favorites',[
          // 左側のuserやfavoritesというキーの名前は、ビューファイルで$userや$favoritesとして使用できる
         'user' => $user,
         'favorites' => $favorites,
      ]);
    }
    
 }