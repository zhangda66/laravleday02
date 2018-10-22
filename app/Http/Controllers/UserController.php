<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        //得到所有数据
        $users=User::paginate(3);
        //引入试图并发送数据
        return view("user/index",compact("users"));
    }
    //添加用户
    public function add(Request $request){

        //判断数据提交方式
        if ($request->isMethod("post")) {
            //1.验证
            $this->validate($request, [
                "name" => "required|unique:users",
                "password" => "required|min:6|confirmed",
                "img" => "required",
                "captcha" => "required|captcha"
            ], [
                "captcha.required" => '验证码不能为空',
                "captcha.captcha" => '验证码有误',
            ]);
            //接收数
            $data = $request->post();
            //
//            $a=$request->file("img");
//            dd($a);


            $data['logo']=$request->file("img")->store("images","image");
            //  dd($data);
            if (User::create($data)) {
                session()->flash("success","添加成功");
                return  redirect("/user/index");
            }
        }else{

            return view("user/add",compact('users'));

        }
        }
        //修改数据
    public  function edit(Request $request,$id){
     //找到id
        $user=User::find($id);
        //判断提交方式
        if($request->isMethod("post")){
            //数据验证
            $this->validate($request, [
                "name" => "required|",
                "password" => "required|min:6|confirmed",


            ]);
            //接收数
            $data = $request->post();
            //判断是否上传了图片


            if($request->file("img")!==null){
                $data['logo']=$request->file("img")->store("images","image");
            }else{
                $data['logo']=$user->logo;
            }
            if ($user->update($data)) {
                return  redirect("/user/index");
            }
        }else{

            return view("user/edit",compact("user"));
        }

    }
    // 删除
    public  function  del($id){
        $user=User::find($id);
        $img=$user['logo'];
        unlink($img);
        if ($user->delete()) {
            return redirect("/user/index");
        }
    }









}
