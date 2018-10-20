@extends("layouts.main")

@section("content")
    <div class="container-fluid">


        <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

        <form class="form-horizontal" method="post" action="">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="商品名称" name="name" >
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品类别</label>
                <div class="col-sm-10">
                    <select name="g_id" class="form-control">

                        <option >请选择类别</option>
                        @foreach($categroys as $a)
                          <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品介绍</label>
                <div class="col-sm-10">
                    <textarea name="intro"cols="60" rows="6" placeholder="商品介绍"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品价格</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="商品价格" name="price" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否上架</label>
                <div class="col-sm-10">
                    <input type="radio"   placeholder="是否上架" name="is_on_sale" value="1" >是
                    <input type="radio"  placeholder="是否上架" name="is_on_sale" value="0">否
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">添加</button>
                </div>
            </div>
        </form>


    </div>




@endsection