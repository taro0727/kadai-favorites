<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    /**
     * ユーザフォローのアクション
     * 
     * @param $id 相手ユーザのid
     * @return \Illuminate\Http\Response
     */
     
     public function store($id)
     {
         //認証済みユーザ（閲覧者）がidのユーザをフォローする
         \Auth::user()->follow($id);
         //前のURLへリダイレクトさせる
         return back();
     }
     
     /**
      * ユーザアンフォローのアクション
      * 
      *@param $id 相手ユーザのid
      * @return \Illuminate\Htto\Response
      */
      public function destroy($id)
      {
          //認証済みユーザが（閲覧者）が、idのユーザをアンフォローする。
          \Auth::user()->unfollow($id);
          //前のURLへリダイレクトさせる
          return back();
      }
}
