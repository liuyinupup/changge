 @extends('layouts.app')
 @section('title', $photo->title)
 @section('script')
 <script>
     $("#show_photo").css("max-height", $(window).height() - 200);
    
         $("img").attr("data-action", "zoom");
   

 </script>
 @stop
 @section('full_content')
 <div class="show_photo">
     <div class="container">
         <div class="row">
             <div class="col-xl-9">
                 <div class="text-center"><img src="{{$photo->src}}" style="max-width:100%" id='show_photo'
                         class="sm_shadow"></div>
                 <div class=" d-xl-none" style="margin-top:30px">
                     <h2>{{$photo->title}}</h2>
                     <p>{{$photo->des}}</p>
                     <p><small>{{$photo->author}} {{$photo->time}} <i
                                 class="fas fa-map-marker-alt"></i>{{$photo->location}}</small></p>

                     <div>
                         <a href="{{ route('photos.show', $previous) }}" class="btn btn-outline-secondary  "
                             role="button" aria-pressed="true"><i class="fas fa-arrow-left"></i> 上一张</a>
                         <a href="{{ route('photos.show', $next) }}" class="btn btn-outline-secondary " role="button"
                             aria-pressed="true">下一张 <i class="fas fa-arrow-right"></i></a>
                         @if (Gate::allows('mang-content'))

                         <a href="{{ route('photos.edit', $photo) }}" class="btn btn-outline-secondary">
                             <i class="fas fa-edit"></i>
                         </a>
                         <button type="submit" class="btn btn-outline-danger" form="nameform">
                             <i class="fas fa-trash-restore"></i>
                         </button>
                         <form action="{{route('photos.destroy',$photo->id)}}" method="POST" id="nameform">
                             {{ csrf_field() }}
                             {{method_field('DELETE')}}

                         </form>

                         @endif
                     </div>

                 </div>
             </div>
             <div class="col-xl-3 d-none d-xl-block ">
                 <div style="position:absolute;bottom:0;padding-right:15px">
                     <h2>{{$photo->title}}</h2>
                     <p>{{$photo->des}}</p>
                     <p><small>{{$photo->author}} {{$photo->time}} <i
                                 class="fas fa-map-marker-alt"></i>{{$photo->location}}</small></p>

                     <div>
                         <a href="{{ route('photos.show', $previous) }}" class="btn btn-outline-secondary  "
                             role="button" aria-pressed="true"><i class="fas fa-arrow-left"></i> 上一张</a>
                         <a href="{{ route('photos.show', $next) }}" class="btn btn-outline-secondary " role="button"
                             aria-pressed="true">下一张 <i class="fas fa-arrow-right"></i></a>
                         @if (Gate::allows('mang-content'))

                         <a href="{{ route('photos.edit', $photo) }}" class="btn btn-outline-secondary">
                             <i class="fas fa-edit"></i>
                         </a>
                         <button type="submit" class="btn btn-outline-danger" form="nameform">
                             <i class="fas fa-trash-restore"></i>
                         </button>
                         <form action="{{route('photos.destroy',$photo->id)}}" method="POST" id="nameform">
                             {{ csrf_field() }}
                             {{method_field('DELETE')}}

                         </form>

                         @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @stop
