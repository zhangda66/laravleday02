@extends("layouts.main")

@section("content")
    <div class="container-fluid">


        <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

        <form class="form-horizontal" method="post" action="">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品类</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="商品类" name="name" >
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="商品" name="c_id" >
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