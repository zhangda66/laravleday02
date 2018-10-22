@extends("layouts.main")

@section("content")
    <div class="container-fluid">


        <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="用户名" name="name" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="确认密码" name="password_confirmation" >
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">头像</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="img">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">验证码</label>
                <div class="col-sm-10">

                    <input id="captcha" class="form-control" name="captcha" placeholder="验证码">
                    <img class="thumbnail captcha" src="{{captcha_src('flat')}}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">注册</button>
                </div>
            </div>
        </form>


    </div>




@endsection