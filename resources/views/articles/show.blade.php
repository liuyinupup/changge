@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-11">
        <div id="test-markdown-view">
            <!-- Server-side output Markdown text -->
            <textarea style="display:none;">{{$article->content}}</textarea>
        </div>
    </div>
    @auth
    @if (\Auth::user()->id===1||\Auth::user()->is_admin)
    <div class="col-1">
        <div class="btn-group-vertical" style="background:white;position:fixed;">
            <a href="{{ route('articles.edit', $article) }}" class="btn active">
                <i class="fas fa-edit"></i>
            </a>
            <form action="{{route('articles.destroy',$article->id)}}" method="POST">
                {{ csrf_field() }}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-link nav-del active">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>

    </div>
    @endif
    @endauth

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
