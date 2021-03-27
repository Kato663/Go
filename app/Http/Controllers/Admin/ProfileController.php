<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\Background; //Background.phpを使用する
use Carbon\Carbon; //時間を管理するところにアクセス

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
      $test_1 = "WBS";  //withテスト
      
      $background = new Background; //Backgroundのデータを$backgroundに代入
      $background->profile_id = $news->id; //backgroundのprofile_idをnewsのidと同じにする
      $background->edited_at = Carbon::now(); //updateが行われた時の時間を表示する
      $background->save(); //updateが行われたときbackgroundを保存する
      

      return redirect('admin/profile')->with('test_1',$test_1);
  }
  
  public function edit(Request $request)
  {
    $profile = Profile::find($request->id);
    if(empty($profile)){
      abort(404);
    }
    return view('admin.profile.edit',['profile_form'=>$profile]);
  }
  
  public function delete(Request $request)
  {
    $profile = Profile::find($request->id);
    $profile->delete();
    return redirect('admin/profile/');
  }
}

