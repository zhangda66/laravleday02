<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    //
    public function  index(Request $request){
        //搜索
        //接收
        $cateId=$request->get("cate_id");
//        dd($cateId);
        $keyword=$request->get("keyword");
        $minPrice=$request->get("minPrice");
        $maxPrice=$request->get("maxPrice");
        //得到所有并要有分页
        $query=Good::orderBy("id");
        if ($keyword!==null){

            $query->where("name","like","%{$keyword}%");
        }

        if ($cateId!==null){
            $query->where("g_id",$cateId);
        }
        if ($minPrice!==null){

            $query->where("price",">=",$minPrice);
        }
        if ($maxPrice!==null){

            $query->where("price","<=",$maxPrice);
        }



        //得到所有数据
        $goods=$query->paginate(3);
        //引入视图分配数据


        $cate=Category::all();
        return view("good/index",compact("cate","goods"));
    }
    //添加商品
    public function add(Request $request){
        //判断数据提交方式
        if ($request->isMethod('post')) {
            //验证，如果没有通过，自动回到上页
            $this->validate($request,[
                    "name"=>"required",
                    "g_id"=>"required",
                    "price"=>"required",
                    "intro"=>"required",
                     "is_on_sale"=>"required",
            ]);
            //接收数据
            $data=$request->post();
            $logo=$request->file("img");
            $data['logo']=$logo->store("images","image");
//            dd($data);
//            $data['logo']=$request->file("img")->store("images","image");
                Good::create($data);
//


                return  redirect("/good/index");

        }else{
            //找到所有数据
            $categroys=Category::all();
            return view("good/add",compact('categroys'));
        }
    }
    //商品修改
    public function edit(Request $request,$id){

        //找到id
        $good=Good::find($id);
        //判断接收数据方式
        if ($request->isMethod("post")) {
            //数据验证
            $this->validate($request,[
                "name"=>"required",
                "g_id"=>"required",
                "price"=>"required",
                "intro"=>"required",
                "is_on_sale"=>"required",
            ]);
            //接收数
            $data = $request->post();
            //判断是否上传了图片
//            dd($request->file("img"));
            if($request->file("img")!==null){
                $data['logo']=$request->file("img")->store("images","image");
            }else{
                $data['logo']=$good->logo;
            }
            if ($good->update($data)) {

                return  redirect("/good/index");
            }
        }else{
            $rows=Good::all();
            return view("good/edit",compact('rows',"good"));
        }
    }
    //删除商品分类
    public function del($id){
        $good=Good::find($id);
        $img=$good['logo'];
        unlink($img);
        if ($good->delete()) {
            return redirect("/good/index");
        }
    }
    //浏览次数
    public function gd(Request $request,$id){
        //找到id
        $good=Good::find($id);




        DB::table('goods')
             ->where('id', $id)
            ->increment('number', 1);
        return view("good/gd",compact("good"));
    }
}
