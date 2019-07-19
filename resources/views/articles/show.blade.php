@extends('layouts.app')
@section('content')
<div id="test-markdown-view">
    <!-- Server-side output Markdown text -->
    <textarea style="display:none;">{{$article->content}}</textarea>             
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
    $(function() {
	    var testView = editormd.markdownToHTML("test-markdown-view", {
            // markdown : "[TOC]\n### Hello world!\n## Heading 2", // Also, you can dynamic set Markdown text
             htmlDecode : true,  // Enable / disable HTML tag encode.
             htmlDecode : "style,script,iframe",  // Note: If enabled, you should filter some dangerous HTML tags for website security.
             tex:true,
        });
    });
</script>    
@stop



