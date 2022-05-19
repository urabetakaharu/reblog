@extends('layouts.app')　
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div>
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </forme>
        
        <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="back">[<a href="/">back]</a></div>
    </body>
</html>

@endsection