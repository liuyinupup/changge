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
        <div class="col">
            <input type="text" class="form-control" placeholder="名称" name='title' autocomplete="false">
        </div>
        <div class="col-7">
            <input type="text" class="form-control" placeholder="网址" name="href" autocomplete="false">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary mb-2">添加导航</button>
        </div>
        <div class="col">
            <a class="btn btn-link " id="edit_nav">编辑</a>
        </div>
    </div>
</form>

@auth
@if($navs->count() > 0)
<div class="row">
    @foreach($navs as $nav)
    @include('navs._navs')
    @endforeach
</div>
@else
@endif
@endauth
@stop
