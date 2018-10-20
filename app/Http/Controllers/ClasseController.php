<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    //
    public function index(){
        //找到所有数据
        $classes=Classe::paginate(3);
        //        dd($admins);exit;
        //显示并传递数据
        return view("classe/index",compact('classes'));
    }
//添加数据
    public function add(Request $request){
        //判断提交方式
        if($request->isMethod("post")){

            //验证，如果没有通过，自动回到上页
            $this->validate($request,[
                "name"=>"required",
                "c_id"=>"required",

            ]);
            //接收数
            $data = $request->post();
//              dd($data);
            if (Classe::create($data)) {
                session()->flash("success","添加成功");
                return  redirect("/classe/index");
            }
        }else{
            //找到所有数据

            return view("classe/add",compact('claase'));

        }
    }
    //商品分类修改
    public function edit(Request $request,$id){
        //找到id
        $classe=Classe::find($id);
        //判断数据提交方式
        if ($request->isMethod("post")) {
            //数据验证
            $this->validate($request,[
                "name"=>"required",
                "c_id"=>"required",

            ]);
            //接收数
            $data = $request->post();
            if ($classe->update($data)) {
                return  redirect("/classe/index");

            }

        }else{
            return view("classe/edit",compact("classe"));
        }
    }
    //删除商品分类
    public function del($id){
        if (Category::find($id)->delete()) {
            return redirect("/category/index");
        }
    }
}
