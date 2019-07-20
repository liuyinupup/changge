@extends('layouts.app')
@section('title', '图片')

@section('full_content')
<div class="show_photo">
<div class="container">
<div class="row">
    @foreach ($photos as $photo)
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6" style="margin-bottom:15px">
        <a href="{{ route('photos.show', $photo) }}">
            <img src="{{ $photo->src }}" width=100%>
        </a>
    </div>
    @endforeach
</div>
<div class="mt-3">
    {!! $photos->render() !!}
</div>
</div>
</div>
@stop
