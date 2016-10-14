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
    $id = $request->get("id");
    $item = DB::table('vegetables')->where('id', $id)->first();
    session()->push("items", $item);
    return redirect("/cart");
});

// カートの中を一覧表示
Route::get('/cart', function(){
    $items = session()->get("items");
    return view("cart", [
        "items" => $items
    ]);
});