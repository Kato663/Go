<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    //
     public function add()
    {
        return view('admin.profile.create');
    }

   public function create(Request $request)
    {
        
        $this->validate($request,Profile::$rules);
        $profile = new Profile; //DB保存
        $form = $request->all(); //$requestの中身を全部$formに入れる
        unset($form['_token']); //$form内のtokenを外す。
        $profile->insert($form ); //git commit と git pushを同時にしている

      return redirect('admin/profile/create');
    }
    
    
  
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = Profile::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['news_form' => $news]);
  }
  
  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
      // 検索されたら検索結果を取得する
      $users = Profile::where('name', $cond_title)->get();
    } else {
    // それ以外はすべての自己紹介文を取得する
      $users = Profile::all();
    }
    return view('admin.profile.index', ['users'=>$users, 'cond_title'=>$cond_title]);
  }
  
   public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, profile::$rules);
      // News Modelからデータを取得する
      $news = profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      unset($news_form['_token']);

      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('admin/profile');
  }
}

