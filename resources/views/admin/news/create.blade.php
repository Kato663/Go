{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ニュース新規作成3</h2>
                
                <form action="{{action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <!--ifからendifまで、まだ良く分からない-->
                    <div class="form-group row">
                        <!--rowは行のことを指しており、12等分できるという考えなので、md-2は行を2/12しておくという意味-->
                        <!--詳しくはブーストラップで検索-->
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title')}}">
                                <!--タイトルの横につくしろいところoldでエラーが出たときに前の文章が保存される？-->
                        </div>
                    </div>
                    <!--ここまでがタイトル文-->
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <!--ここまでが本文-->
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <!--typeをfileにすることでデスクトップフォルダ検索できるようになる-->
                            <!--右の選択されていませんを編集する方法は不明-->
                        </div>
                    </div>
                    <!--ここまでが画像の入れ方-->
                    {{ csrf_field()}}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection