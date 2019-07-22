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
<div class="row">


    <div class="col-lg-9">
        <div id="test-markdown-view" class="sm_shadow" style="overflow: visible;">
            <!-- Server-side output Markdown text -->
            <textarea style="display:none;">{{$article->content}}</textarea>
        </div>
    </div>
    <div class="col-lg-3 d-none d-lg-block">
        <aside class="sticky-top sm_shadow" style="z-index:-1;">
            <div id="category" class="list-group">
            </div>
        </aside>
    </div>
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
            tocm: true,
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("h2").each(function (i, item) {
            var tag = $(item).get(0).localName;
            $(item).attr("id", "wow" + i);
            $("#category").append('<a class="new' + tag +
                ' list-group-item list-group-item-action " href="#wow' + i + '">' + $(this).text() +
                '</a>');
            $(".newh1").css("padding-left", 0);
            $(".newh2").css("padding-left", 20);
            $(".newh3").css("padding-left", 40);
        });
        $(".editormd-tex").attr("float", "none");

        $("img").attr("data-action", "zoom");


    });

</script>
@stop
