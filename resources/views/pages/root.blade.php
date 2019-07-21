@extends('layouts.app')
@section('title', '首页')
@section('content')
@if($photo)
<div class="card mb-3">
    <img class="card-img-top" src="{{ $photo->src }}" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title">{{$photo->title}}</h4>
        <p class="card-text">{{$photo->des}}</p>
        <p class="card-text"><small class="text-muted">{{$photo->author}} {{$photo->time}} <i
                    class="fas fa-map-marker-alt"></i>{{$photo->location}}</small>
        </p>
    </div>
</div>
@endif

@if($article)
<div id="test-markdown-view">
    <!-- Server-side output Markdown text -->
    <textarea style="display:none;">{{$article->content}}</textarea>
</div>
@endif

<div style="position:fixed ;right:8px;bottom:200px">
    <a href="#page_top">
        <i class="fas fa-chevron-circle-up fa-2x " style="color:#00b5ad"></i>
    </a>
    <br />
    <a href="#page_bottom">
        <i class="fas fa-chevron-circle-down fa-2x" style="color:#00b5ad"></i>
    </a>
</div>
@stop


@section('style')
<link rel="stylesheet" href="{{asset('editormd/css/editormd.preview.css')}}" />
@stop

@section('script')
<script src="{{asset('editormd/editormd.js')}}"></script>
<script src="{{asset('editormd/lib/marked.min.js')}}"></script>
<script src="{{asset('editormd/lib/prettify.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        var testView = editormd.markdownToHTML("test-markdown-view", {
            // markdown : "[TOC]\n### Hello world!\n## Heading 2", // Also, you can dynamic set Markdown text
            htmlDecode: true, // Enable / disable HTML tag encode.
            htmlDecode: "style,script,iframe", // Note: If enabled, you should filter some dangerous HTML tags for website security.
            tex: true,
            tocm:true,
        });
    });

</script>
@stop
