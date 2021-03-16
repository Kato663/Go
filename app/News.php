<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $guarded = array('id');
    //
    public static $rules = array(
    	'title' => 'required', //必須項目
    	'body' => 'required',
    	);
}

class profiles extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
}