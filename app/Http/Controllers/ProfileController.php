<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Profile;

class ProfileController extends Controller
{
	public function index(Request $request)
	{
		$posts = Profile::all()->sortByDesc('updated_at');
		
		if (count($posts) > 0) {
			$headline = $posts->shift(); //一番新しい情報以外を入れる
		} else {
			$headline = null;
		}
		return view('profile.index', ['headline' => $headline, 'posts' => $posts]); //viewのprofileのindexに一番新しい情報「headline」とそれ以外の「posts」を送る
	}
} 
