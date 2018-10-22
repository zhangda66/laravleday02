@extends("layouts.main")

@section("content")
    <div class="container-fluid">


        <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="商品名称" name="name"  value="{{$good->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品类别</label>
                <div class="col-sm-10">
                    <select name="g_id" class="form-control">

                        <option >请选择类别</option>
                        @foreach($rows as $a)
                            <option value="<?=$a['id']?>"   <?php if($a['id']===$good['g_id'])echo "selected"?> ><?=$a['name']?></option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">图像</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="img">
                    <img src="/{{$good->logo}}" alt="">
                </div>
            </div>
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">商品介绍</label>
                <div class="col-sm-10">
                    <textarea name="intro"cols="60" rows="2" placeholder="商品介绍">{{$good->intro}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">商品价格</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="商品价格" name="price" value="{{$good->price}}" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">是否上架</label>
                <div class="col-sm-10">
                    <input type="radio"   placeholder="是否上架" name="is_on_sale" value="1" <?php if($good["is_on_sale"]===1) echo "checked"?>>是
                    <input type="radio"  placeholder="是否上架" name="is_on_sale" value="0" <?php if($good["is_on_sale"]===0) echo "checked"?>>否
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">浏览次数</label>
                <div class="col-sm-10">
                   <a href="good/gd">浏览次数</a>
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