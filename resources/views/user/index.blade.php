@extends("layouts.main")

@section("content")

<a href="/user/add" class="btn btn-info">添加</a>

<table  class="table table-bordered" >
    <tr>
        <th>用户编号</th>
        <th>用户姓名</th>
        <th>用户密码</th>
        <th>用户头像</th>

        <th>操作</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->password}}</td>
            <td><img src="/{{$user->logo}}" height="70" alt=""></td>
            <td>
                <a href="{{route("user.edit",$user->id)}}" class="btn btn-success">编辑</a>
                <a href="{{route("user.del",$user->id)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
    @endforeach
</table>
{{$users->links()}}
@endsection