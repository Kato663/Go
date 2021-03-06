{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>課題用Profile</h2>
                
            </div>
        </div>
         <form action="{{action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
            <div class="form-group row">
                <label class="col-md-2" for="name">氏名</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                    <!--タイトルの横につくしろいところoldでエラーが出たときに前の文章が保存される？-->
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-2" for="gender">性別</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="gender" value="{{ old('name')}}">
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-2" for="hobby">趣味</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="hobby" value="{{old('hobby')}}">
                </div>
            </div>
            
            <div class="form-group row">
                <lavel class="col-md-2" for="introduction">自己紹介</lavel>
                 <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="15">{{ old('introduction') }}</textarea>
                        </div>
            </div>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" value="更新">
                </div>
                <div class="col-md-10">
                    <a href="{{ action('Admin\ProfileController@index') }}" role="button" class="btn btn-primary col-md-9">プロファイル一覧に戻る</a>
                </div>
            </div>
        </form>
    </div>
@endsection