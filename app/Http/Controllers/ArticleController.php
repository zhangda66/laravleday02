<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Classe;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
            //找到所有数据
            $articles=Article::paginate(3);
    //        dd($admins);exit;
            //显示并传递数据
            return view("article/index",compact('articles'));
        }
        //添加数据
        public function add(Request $request){
            //数据验证
            $this->validate($request,[
                "title"=>"required",
                "content"=>"required",
                "author"=>"required",
                "a_id"=>"required",

            ]);
            //判断提交方式
            if($request->isMethod("post")){

                //验证，如果没有通过，自动回到上页
                $this->validate($request,[
//                    "title"=>"required|max:15|min:6",
//                    "content"=>"required|max:15|min:6",
                ]);
                //接收数
                $data = $request->post();
             //  dd($data);
                if (Article::create($data)) {
                    session()->flash("success","添加成功");
                    return  redirect("/article/index");
                }
            }else{
                //找到所有数据
                $claases=Classe::all();
                return view("article/add",compact('claases'));

            }
        }
    //修改数据
    public function edit(Request $request,$id){
        //通过ID找到对象
        $article=Article::find($id);
//        dd($articles);exit;
        //判断提交方式
        if($request->isMethod("post")){
            //接收数
            $data = $request->post();
            if ($article->update($data)) {
                return  redirect("/article/index");
            }
        }else{
            $rows=Classe::all();
            return view("article/edit",compact('rows',"article"));
        }
    }
    //删除数据
    public  function del($id){
        //找到id
        $articles=Article::find($id);
        //删除
        if ($articles->delete()) {
            return redirect("/article/index");
        }
    }
}
