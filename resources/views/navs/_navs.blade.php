<div class="col-2">
    <a href="{{$nav->href}}" class="list-group-item list-group-item-action list-group-item-light">
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
