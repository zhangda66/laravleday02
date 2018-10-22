@extends("layouts.main")

@section("content")

    <div class="row">
        <div class="col-md-4">
            <a href="{{route("good.add")}}" class="btn btn-info">添加</a>
        </div>
        <div class="col-md-8">
            <form class="form-inline pull-right" method="get">
                <div class="form-group">
                    <select name="cate_id" class="form-control">
                        <option value="">请选择分类</option>
                        @foreach($cate as $a)
                            <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="最低价" size="5" name="minPrice">
                </div>
                -
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="最高价" size="5" name="maxPrice">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="请输入名称" name="keyword">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
    </div>
<br/><br/>

    <table class="table">
    <tr>
        <th>Id</th>
        <th>名称</th>
        <th>类别</th>
        <th>图像</th>
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
            <td><img src="/{{$good->logo}}" height="70" alt=""></td>
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