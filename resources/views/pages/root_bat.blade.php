@extends('layouts.app')
@section('title', '首页')
@section('script')
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#edit_nav").click(function () {
            $(".nav-del").toggle();
        });
    });

</script>
@endsection
@section('content')
<form action="{{route('navs.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-xl col-lg col-md col-4">
            <input type="text" class="form-control" placeholder="名称" name='title' autocomplete="false">
        </div>
        <div class="col-xl-7 col-lg-7 col-md-7 col-8" style="margin-bottom:5px">
            <input type="text" class="form-control" placeholder="网址" name="href" autocomplete="false">
        </div>
        <div class="col-xl col-lg col-md col" >
            <button type="submit" class="btn btn-success ">添加</button>
            <a class="btn btn-secondary " id="edit_nav">编辑</a>
        </div>
    </div>
</form>
@auth
@if($navs->count() > 0)
<div class="row" style="background:white;margin-top:15px;padding-top:15px;padding-bottom:15px">
    @foreach($navs as $nav)
    @include('navs._navs')
    @endforeach
</div>
@else
@endif
@endauth
@stop
