@extends("layouts.main")

@section("content")

<a href="/classe/add" class="btn btn-info">添加</a>

<table class="table">
    <tr>
        <th>Id</th>
        <th>文章类</th>
        <th>文章</th>
        <th>操作</th>
    </tr>
    @foreach($classes as $classe)
        <tr>
            <td>{{$classe->id}}</td>
            <td>{{$classe->name}}</td>
            <td>{{$classe->c_id}}</td>
            <td>
                <a href="{{route("classe.edit",$classe->id)}}" class="btn btn-success">编辑</a>
                <a href="{{route("classe.del",$classe->id)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
    @endforeach
</table>
{{$classes->links()}}
@endsection