<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\News;

class NewsController extends Controller
{
  //
  public function add()
  {
    return view('admin.news.create');
  }
  
  public function create(Request $request)
  {
    $this->validate($request, News::$rules);
    $news = new News;
    $form = $request->all();
    
    if(isset($form['image'])){
      $path = $request -> file('image') -> store('public/image');
      $news -> image_path = basename($path);
    }  //画像が送られてきたら、$news->image_pathに画像を保存する
    else{
      $news -> image_path = null;
    }
    unset($form['_token']);
    unset($form['image']);
    
    $news -> fill($form);
    $news -> save();
    // admin/news/createにリダイレクトする
    return redirect('admin/news/create');
  }  
  
  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
      // 検索されたら検索結果を取得する
      $posts = News::where('title', $cond_title)->get();
    } else {
    // それ以外はすべてのニュースを取得する
      $posts = News::all();
    }
    return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

}

