@extends('layouts.app')

@section('title', '图片-'.$photo->title)

@section('full_content')
<div class="row" >
        <div class="col-3">{{$photo->title}}</div>
        <div class="col-9"><img src="{{$photo->src}}" width="100%"></div>
        
</div>
@stop