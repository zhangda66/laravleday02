@extends("layouts.main")

@section("content")

<a href="/good/add" class="btn btn-info">添加</a>

<table class="table">
    <tr>
        <th>Id</th>
        <th>名称</th>
        <th>类别</th>
        <th>价格</th>
        <th>介绍</th>
        <th>是否上架</th>
        <th>浏览次数</th>
        <th>操作</th>
    </tr>
    @foreach($goods as $good)
        <tr>
            <td>{{$good->id}}</td>
            <td>{{$good->name}}</td>
            <td>{{$good->category->name}}</td>
            <td>{{$good->price}}</td>
            <td>{{$good->intro}}</td>
            <td>{{$good->is_on_sale}}</td>
            <td>{{$good->number}}</td>
            <td>

                <a href="{{route('good.gd',$good->id)}}" class="btn btn-success">查看</a>
                <a href="{{route('good.edit',$good->id)}}" class="btn btn-success">编辑</a>
                <a href="{{route('good.del',$good->id)}}" class="btn btn-danger">删除</a>
            </td>
        </tr>
    @endforeach
</table>
{{$goods->links()}}
@endsection