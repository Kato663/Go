<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
    	$posts = News::all()->sortByDesc('updated_at'); //更新順に並び替え
    	
    	if (count($posts) > 0) {
    		$headline = $posts->shift(); //一番頭のデータだけを切り抜く
    	} else {
    		$headline = null;
    	}
    	
    	return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
