@extends('layouts.app')
@section('title', '文章')

@section('content')
<div class="row">
    @foreach ($articles as $article)
    <div class="col-3" style="margin-bottom:15px">
        <a href="{{ route('articles.show', $article) }}">
            {{$article->title}}
        </a>
    </div>
    @endforeach
</div>
@stop
