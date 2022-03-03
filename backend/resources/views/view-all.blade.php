@extends('layouts.app') <!-- 継承、includeみたいなもの //layoutフォルダーのapp.blade.php -->

 @section('title','All Posts')<!-- 　ブラウザのタグの名前　-->

@section('header')
<h1>All Posts</h1>
@endsection 

@section('content')
    @if(count($post_titles))
        <ul>
            @foreach($post_titles as $title)
                <li>{{ $title }}</li>
             @endforeach
        </ul>
    @endif
@endsection

@section('footer')
<p>This is the footer</p>
@endsection

<!-- 完全に消さないとAll Posts が２回繰り返されちゃう -->
<!-- @extends('layouts.app')   // 6 // Route->PostContoller vieAllPost->ここ->app.vblade.php

@section('title','All Posts')

@section('header')　//app.blade.phpの＠yieldに入り込む
<h1>All Posts</h1>
@endsection 

@section('content')
    <p>This is a main content.</p>
@endsection

@section('footer')
<p>This is the footer</p>
@endsection -->

<!-- <!DOCTYPE html>　   //4
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>
    <header>
        <h1>All Posts</h1>
    </header>
    <main>
        <p>This page shows all the posts you created.</p>
    </main>
</body>
</html> -->