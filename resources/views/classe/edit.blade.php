@extends("layouts.main")

@section("content")
    <div class="container-fluid">


        <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

        <form class="form-horizontal" method="post" action="">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">文章类</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="文章类" name="name"  value="{{$classe->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">文章</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="文章" name="c_id" value="{{$classe->c_id}}" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">修改</button>
                </div>
            </div>
        </form>


    </div>




@endsection