@extends('layouts.app')　
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        
    </head>
    <body>
        <h1 class="title">
            {{ $tests2->title }}
        </h1>
        <p class="edit">[<a href="/posts/{{ $tests2->id }}/edit">edit</a>]</p>
        
        <form action="/posts/{{ $tests2->id }}" id="form_{{ $tests2->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button> 
        </form>
        
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $tests2->body }}</p>    
            </div>
        </div>
        
        <div class='footer'>
            <a href="/">戻る</a>
        </div>
    </body>
</html>

@endsection