<div class="col-xl-2 col-lg-4 col-md-6 col-6" style="margin-bottom:15px;">
    <a href="{{$nav->href}}" class="list-group-item list-group-item-action list-group-item-light" target="_blank" style=" width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis; display:block;">
        <form action="{{route('navs.destroy',$nav->id)}}" method="POST">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-link nav-del"
                style="display:none;margin:-8px;padding:5px;padding-right:10px">
                <li class="fa fa-times"></li>
            </button>
            {{$nav->title}}
        </form>
    </a>
</div>
