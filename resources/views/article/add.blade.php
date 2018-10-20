@extends("layouts.main")

@section("content")
    <div class="container-fluid">


        <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

        <form class="form-horizontal" method="post" action="">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">文章标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="文章标题" name="title" >
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">文章类别</label>
                <div class="col-sm-10">
                    <select name="a_id" class="form-control">

                        <option >请选择类别</option>
                        @foreach($claases as $a)
                          <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">文章内容</label>
                <div class="col-sm-10">
                    <textarea name="content"cols="60" rows="10" placeholder="文章内容"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">作者</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="作者" name="author" >
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