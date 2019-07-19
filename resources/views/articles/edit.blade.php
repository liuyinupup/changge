@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-body">
                <h2 class="text-center">
                    <i class="glyphicon glyphicon-edit"></i>
                    @if($article->id)
                    编辑文章
                    @else
                    新建文章
                    @endif
                </h2>

                <hr>

                @if($article->id)
                <form action="{{ route('articles.update', $article->id) }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    @else
                    <form action="{{ route('articles.store') }}" method="POST" accept-charset="UTF-8">
                        @endif

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input class="form-control" type="text" name="title"
                                value="{{ old('title', $article->title ) }}" placeholder="请填写标题" required />
                        </div>



                        <div class="form-group" id="editormd_id">
                            <textarea name="content" class="form-control" id="editor" rows="3"
                                placeholder="请填入至少三个字符的内容。" required>{{ old('body', $article->content ) }}</textarea>
                        </div>

                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"
                                    aria-hidden="true"></span> 保存</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('style')

{!! editor_css() !!}
@stop

@section('script')

{!! editor_js() !!}
@stop
