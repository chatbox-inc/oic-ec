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
    $item = DB::table('vegetables')->where('id', $id)->first(); //idが一致するものをvegetableテーブルから検索、取得
    session()->push("items", $item); //取得したデータをsessionに保存。sessionは配列だが、取得したデータ自体はオブジェクト。
    return redirect("/cart"); //カートのページへリダイレクト
});

// カートの中を一覧表示
Route::get('/cart', function(){
    $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
    return view("cart", [ //データを渡してビューを表示
        "items" => $items
    ]);
});

// 商品を削除
Route::get('/delete', function(Request $request){
    $index = $request->get("index"); //削除した商品のindexを取得
    session()->forget("items.$index"); //sessionから選んだ商品を削除
    return redirect("/cart");
});

// カートを空にする
Route::get('/delete/all', function(){
    session()->flush(); //sessionの全データを削除
    return redirect("/cart"); //カートのページへリダイレクト
});