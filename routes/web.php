<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//文章路由
Route::get('/article/index', "ArticleController@index")->name("article.index");
Route::any('/article/add', "ArticleController@add")->name("article.add");
Route::any('/article/edit/{id}', "ArticleController@edit")->name("article.edit");
Route::any('/article/del/{id}', "ArticleController@del")->name("article.del");

//文章分类路由
Route::get('/classe/index', "ClasseController@index")->name("classe.index");
Route::any('/classe/add', "ClasseController@add")->name("classe.add");
Route::any('/classe/edit/{id}', "ClasseController@edit")->name("classe.edit");
Route::any('/classe/del/{id}', "ClasseController@del")->name("classe.del");


//商品分类路由
Route::get('/category/index', "CategoryController@index")->name("category.index");
Route::any('/category/add', "CategoryController@add")->name("category.add");
Route::any('/category/edit/{id}', "CategoryController@edit")->name("category.edit");
Route::any('/category/del/{id}', "CategoryController@del")->name("category.del");


//商品路由
Route::get('/good/index', "GoodController@index")->name("good.index");
Route::any('/good/add', "GoodController@add")->name("good.add");
Route::any('/good/edit/{id}', "GoodController@edit")->name("good.edit");
Route::any('/good/del/{id}', "GoodController@del")->name("good.del");
//浏览次数
Route::any('/good/gd/{id}', "GoodController@gd")->name("good.gd");



//用户路由
Route::get('/user/index', "UserController@index")->name("user.index");
Route::any('/user/add', "UserController@add")->name("user.add");
Route::any('/user/edit/{id}', "UserController@edit")->name("user.edit");
Route::any('/user/del/{id}', "UserController@del")->name("user.del");