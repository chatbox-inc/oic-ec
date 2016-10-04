<?php

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

Route::get('/', function () {
    return view('index');
});
Route::get('/detail', function (Request $request) {
    $vegetable = [];
    $potatoes = [
        "name" => "POTATOES",
        "img" => "images/potatoes.jpg",
        "description" => "北海道産の大地でとれたおいしいじゃがいもです。カレーにはメークインよりもホクホクとした男爵いもがピッタリ！",
        "size" => "5kg",
        "content" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
        "price" => "¥ 5,300",
    ];
    $carrots = [
        "name" => "CARROTS",
        "img" => "images/carrot.jpg",
        "description" => "青森県産のにんじんです。土のついた採れたてのものをお届けします！",
        "size" => "6kg",
        "content" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
        "price" => "¥ 5,400",
    ];
    $onions = [
        "name" => "ONIONS",
        "img" => "images/onion.jpg",
        "description" => "北海道産の大きなたまねぎです。通常のサイズの２倍！",
        "size" => "6kg",
        "content" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
        "price" => "¥ 6,000",
    ];
    $curryPowder = [
        "name" => "CURRY POWDER",
        "img" => "images/curryPowder.jpg",
        "description" => "本場インドの香り高いカレーパウダーです。お子様にも食べやすい辛さです。",
        "size" => "3kg",
        "content" => "業務用サイズ。",
        "price" => "¥ 1,800",
    ];
    $meet = [
        "name" => "MEET",
        "img" => "images/meet.png",
        "description" => "鹿児島県産の程よい脂ののったロース肉です。少し大きめの一口サイズにカットしてお届けします！",
        "size" => "2kg",
        "content" => "業務用サイズ（冷凍）。クール便での配送となります。",
        "price" => "¥ 3,000",
    ];

    $id = $request->get("id");

    if($id === "1"){
        $vegetable = $potatoes;
    }
    if($id === "2"){
        $vegetable = $carrots;
    }
    if($id === "3"){
        $vegetable = $onions;
    }
    if($id === "4"){
        $vegetable = $curryPowder;
    }
    if($id === "5"){
        $vegetable = $meet;
    }

    return view('detail', [
        "vegetable" => $vegetable
    ]);
});
