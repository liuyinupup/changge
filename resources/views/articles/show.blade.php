@extends('layouts.app')
@section('content')

<div id="test-markdown-view">
    <!-- Server-side output Markdown text -->
    <textarea style="display:none;">{{$article->content}}</textarea>
</div>
<div style="margin-top:15px">
    <a href="{{ route('articles.show', $previous) }}" class="btn btn-outline-secondary pull-left " role="button"
        aria-pressed="true"><i class="fas fa-arrow-left"></i>上一篇</a>
    <a href="{{ route('articles.show', $next) }}" class="btn btn-outline-secondary pull-right" role="button"
        aria-pressed="true">下一篇<i class="fas fa-arrow-right"></i></a>



</div>

<div style="position:fixed ;right:8px;bottom:200px">
    @if (Gate::allows('mang-content'))

    <a href="{{ route('articles.edit', $article) }}" class="text-secondary" >
        <i class="fas fa-pen fa-2x"></i>
    </a>
    <br/>
    <button type="submit" form="nameform" class="btn btn-link text-secondary" style="padding:0">
        <i class="fas fa-trash-restore fa-2x"></i>
    </button>

    <form action="{{route('articles.destroy',$article->id)}}" method="POST" id="nameform">
        {{ csrf_field() }}
        {{method_field('DELETE')}}

    </form>
    @endif
    <a href="#page_top" class="text-secondary">
        <i<i class="fas fa-chevron-circle-up fa-2x "></i>
    </a>
    <br />
    <a href="#page_bottom" class="text-secondary">
        <i<i class="fas fa-chevron-circle-down fa-2x"></i>
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
        });
    });

</script>
@stop
