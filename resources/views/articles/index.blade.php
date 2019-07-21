@extends('layouts.app')
@section('title', '文章')

@section('content')
<div class="list-group sm_shadow">
    @foreach ($articles as $article)
    
    <a href="{{ route('articles.show', $article) }}" class="list-group-item list-group-item-action ">

        {{$article->title}}
    </a>

    @endforeach
</div>
<div class="mt-3">
    {!! $articles->render() !!}
</div>
@stop
