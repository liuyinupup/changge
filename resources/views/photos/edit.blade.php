@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 offset-md-2">

        <div class="card">
            <div class="card-header">
                <h4>
                    @if($photo->id)
                    编辑图片
                    @else
                    添加图片
                    @endif
                </h4>
            </div>

            <div class="card-body">
                @if($photo->id)
                <form action="{{ route('photos.update', $photo->id) }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                <form action="{{ route('photos.store') }}" method="POST" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="title-field">标题</label>
                            <input class="form-control" type="text" name="title" id="title-field"
                                value="{{ old('title', $photo->title) }}" />
                        </div>
                        <div class="form-group">
                            <label for="author-field">作者</label>
                            <input class="form-control" type="text" name="author" id="author-field"
                                value="{{ old('author', $photo->author) }}" />
                        </div>
                        <div class="form-group">
                            <label for="location-field">地点</label>
                            <input class="form-control" type="text" name="location" id="location-field"
                                value="{{ old('location', $photo->location) }}" />
                        </div>
                        <div class="form-group">
                            <label for="time-field">日期</label>
                            <input class="form-control" type="text" name="time" id="time-field"
                                value="{{ old('time', $photo->time) }}" />
                        </div>
                        <div class="form-group">
                            <label for="des-field">简介</label>
                            <textarea name="des" id="des-field" class="form-control"
                                rows="3">{{ old('des', $photo->des) }}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="src-label">图片</label>
                            <input type="file" name="src" class="form-control-file">
                           

                            @if($photo->src)
                            <br>
                            <img class="thumbnail img-responsive" src="{{ $photo->src }}" width="200" />
                            @endif
                        </div>
                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
