@extends('layouts.app')
@section('title', '图片')

@section('content')
<div class="row">
    @foreach ($photos as $photo)
    <div class="col-3" style="margin-bottom:15px">
        <a href="{{ route('photos.show', $photo) }}">
            <img src="{{ $photo->src }}" width=100%>
        </a>
    </div>
    @endforeach
</div>
@stop
