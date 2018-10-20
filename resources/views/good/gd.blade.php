@extends("layouts.main")

@section("content")
    <table class="table">
        <tr>
            <th>Id</th>
            <th>名称</th>
            <th>类别</th>
            <th>价格</th>
            <th>介绍</th>
            <th>是否上架</th>
            <th>浏览次数</th>
        </tr>

            <tr>
                <td>{{$good->id}}</td>
                <td>{{$good->name}}</td>
                <td>{{$good->category->name}}</td>
                <td>{{$good->price}}</td>
                <td>{{$good->intro}}</td>
                <td>{{$good->is_on_sale}}</td>
                <td>{{$good->number}}</td>
  </tr>

@endsection