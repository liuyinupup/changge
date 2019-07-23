@extends('layouts.app')
@section('title',$article->title)
@section('content')
<div class="row">


    <div class="col-lg-9">
        <div id="test-markdown-view" class="sm_shadow" style="overflow: visible;">
            <!-- Server-side output Markdown text -->
            <textarea style="display:none;">{{$article->content}}</textarea>
        </div>
        <div style="margin-top:15px">
            <a href="{{ route('articles.show', $previous) }}" class="btn btn-outline-secondary pull-left " role="button"
                aria-pressed="true"><i class="fas fa-arrow-left"></i>上一篇</a>
            <a href="{{ route('articles.show', $next) }}" class="btn btn-outline-secondary pull-right" role="button"
                aria-pressed="true">下一篇<i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 d-none d-lg-block">
        <aside class="sticky-top sm_shadow" style="z-index:0;">
            <div id="category" class="list-group">
            </div>
        </aside>
    </div>
</div>


<div style="position:fixed ;right:8px;bottom:200px">
    @if (Gate::allows('mang-content'))

    <a href="{{ route('articles.edit', $article) }}">
        <i class="fas fa-pen fa-2x" style="color:#00b5ad"></i>
    </a>
    <br />
    <button type="submit" form="nameform" class="btn btn-link " style="padding:0">
        <i class="fas fa-trash-restore fa-2x" style="color:#00b5ad"></i>
    </button>

    <form action="{{route('articles.destroy',$article->id)}}" method="POST" id="nameform">
        {{ csrf_field() }}
        {{method_field('DELETE')}}

    </form>
    @endif
    <a href="#page_top">
        <i<i class="fas fa-chevron-circle-up fa-2x " style="color:#00b5ad"></i>
    </a>
    <br />
    <a href="#page_bottom">
        <i<i class="fas fa-chevron-circle-down fa-2x" style="color:#00b5ad"></i>
    </a>
</div>
@stop

@section('style')
<link rel="stylesheet" href="{{asset('editormd/css/editormd.preview.css')}}" />
<style>
    .markdown-toc {}

</style>
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

        $("img").attr("data-action", "zoom");

        {{--  $(".katex").attr("overflow", "hidden");  --}}
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
    });

</script>
@stop
