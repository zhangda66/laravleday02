<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{
    //
    public function  index(){
        //得到所有数据
        $goods=Good::paginate(3);
        //引入视图分配数据
        return view("good/index",compact("goods"));
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
//            dd($data);
            if(Good::create($data)){
                session()->flash("success","添加成功");
                return  redirect("/good/index");
            }
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
        if (Good::find($id)->delete()) {
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
