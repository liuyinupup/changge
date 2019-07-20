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

<div class="btn-group-vertical" style="position:fixed ;right:60px;bottom:100px">
    @if (Gate::allows('mang-content'))

    <a href="{{ route('articles.edit', $article) }}" class="btn btn-success ">
        <i class="fas fa-edit fa-2x"></i>
    </a>
    <button type="submit" class="btn btn-danger " form="nameform">
        <i class="fas fa-trash-alt fa-2x"></i>
    </button>

    <form action="{{route('articles.destroy',$article->id)}}" method="POST" id="nameform">
        {{ csrf_field() }}
        {{method_field('DELETE')}}

    </form>
    @endif
    <a href="#page_top" class="btn btn-success ">
        <i<i class="fas fa-chevron-circle-up fa-2x"></i>
    </a>
    <a href="#page_bottom" class="btn  btn-success  ">
        <i<i class="fas fa-chevron-circle-down fa-2x"></i>
    </a>
    


</div>




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
