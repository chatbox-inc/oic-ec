<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// トップページ（vegetablesテーブルの全データを表示）
Route::get('/', function () {
    $vegetables = DB::table('vegetables')->get();
    return view('index', [
        "vegetables" => $vegetables
    ]);
});

// 詳細ページ
Route::get('/detail', function(Request $request){
    $id = $request->get("id");
    $vegetable = DB::table('vegetables')->where('id', $id)->first();

    return view('detail', [
        "vegetable" => $vegetable
    ]);
});

// カートに入れる
Route::post('/cart', function(Request $request){
    $id = $request->get("id"); //idを取得
    $cart = new \App\Service\CartService();
    $cart->addItem($id);
    return redirect("/cart"); //カートのページへリダイレクト
});

// カートの中を一覧表示
Route::get('/cart', function(){
    $cart = new \App\Service\CartService();
    return view("cart", [ //データを渡してビューを表示
        "items" => $cart->getItems()
    ]);
});

// 商品を削除
Route::get('/delete', function(Request $request){
    $index = $request->get("index"); //削除した商品のindexを取得
    $cart = new \App\Service\CartService();
    $cart->removeItem($index);
    return redirect("/cart");
});

// カートを空にする
Route::get('/delete/all', function(){
    $cart = new \App\Service\CartService();
    $cart->clear();
    return redirect("/cart"); //カートのページへリダイレクト
});