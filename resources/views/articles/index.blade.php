@extends('layouts.app')
@section('title', '文章')

@section('content')
<div class="list-group">
    @foreach ($articles as $article)
    
    <a href="{{ route('articles.show', $article) }}" class="list-group-item list-group-item-action ">


        {{$article->title}}
    </a>

    @endforeach
</div>
@stop
