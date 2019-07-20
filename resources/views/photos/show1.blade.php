@extends('layouts.app')

@section('title', '图片-'.$photo->title)

@section('full_content')
<div class="row">
    <div class="col-9">
        <div class="container"><img src="{{$photo->src}}" width="100%"></div>
    </div>
    <div class="col-3">
        @auth
        @if (\Auth::user()->id===1||\Auth::user()->is_admin)
        <div class="btn-group-vertical" style="background:white;">
            <a href="{{ route('photos.edit', $photo) }}" class="btn active">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{route('photos.destroy',$photo->id)}}" method="POST">
                {{ csrf_field() }}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-link nav-del active">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
        @endif
        @endauth
        <div class="container" style="position:absolute;bottom:0;">
            <h2>{{$photo->title}}</h2>
            <p>{{$photo->des}}</p>
            <address>{{$photo->author}} {{$photo->time}} {{$photo->location}}</address>
        </div>
    </div>



</div>

@stop


