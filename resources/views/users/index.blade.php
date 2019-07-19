@extends('layouts.app')
@section('title', '用户管理')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">用户名</th>
            <th scope="col">身份</th>
            <th scope="col">删除</th>
            <th scope="col">管理员</buttom>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->name}}</th>
            <td>
                @if($user->id==1)
                站长
                @elseif ($user->is_admin)
                管理员
                @else
                普通用户
                @endif

            </td>
            <td>
                @can('user_management', $user)
                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-link nav-del ">
                        删除用户
                    </button>
                </form>
                @endcan
            </td>
            <td>
                @can('user_management', $user)
                <form method="POST" action="{{ route('users.update', $user->id )}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-link nav-del ">
                        @if($user->is_admin)
                        取消管理员
                        @else
                        设为管理员
                        @endif
                    </button>
                </form>
                @endcan
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
@stop
