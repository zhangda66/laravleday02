<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        //得到所有数据
        $categorys=Category::paginate(3);
        //显示并传递数据
        return view("category/index",compact('categorys'));
    }
    //添加商品分类
    public  function add(Request $request){
        //数据验证
        $this->validate($request,[
            "name"=>"required",
            "c_id"=>"required",

        ]);
        //判断数据提交方式
        if ($request->isMethod("post")) {
            //数据验证
            $this->validate($request,[
//                    "title"=>"required|max:15|min:6",
//                    "content"=>"required|max:15|min:6",
            ]);
            //接收数据
            $data=$request->post();
            if(Category::create($data)){
                return  redirect("/category/index");
            }
        }else{
            return view("category/add");
        }

    }
    //商品分类修改
    public function edit(Request $request,$id){
        //找到id
        $category=Category::find($id);
        //判断数据提交方式
        if ($request->isMethod("post")) {
            //数据验证
            $this->validate($request,[
                "name"=>"required",
                "c_id"=>"required",

            ]);
            //接收数
            $data = $request->post();
            if ($category->update($data)) {
                return  redirect("/category/index");

            }

        }else{
            return view("category/edit",compact("category"));
        }
    }
    //删除商品分类
    public function del($id){
        if (Category::find($id)->delete()) {
            return redirect("/category/index");
        }
    }

}
