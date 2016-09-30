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
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/detail', function (Request $request) {
    $vegetable = [];
    $potatoes = [
        "name" => "POTATOES",
        "img" => "images/potatoes.jpg",
        "description" => "北海道産の大地でとれたおいしいじゃがいもです。カレーにはメークインよりもホクホクとした男爵いもがピッタリ！",
        "size_1" => "5kg",
        "content_1" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
        "price_1" => "¥ 5,300",
        "size_2" => "1kg",
        "content_2" => "家庭用サイズ。ダンボール箱、常温便での配送となります。",
        "price_2" => "¥ 2,000"
    ];
    $carrots = [
        "name" => "CARROTS",
        "img" => "images/carrot.jpg",
        "description" => "青森県産のにんじんです。土のついた採れたてのものをお届けします！",
        "size_1" => "6kg",
        "content_1" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
        "price_1" => "¥ 5,400",
        "size_2" => "1kg",
        "content_2" => "家庭用サイズ。ダンボール箱、常温便での配送となります。",
        "price_2" => "¥ 2,100"
    ];
    $onions = [
        "name" => "ONIONS",
        "img" => "images/onion.jpg",
        "description" => "北海道産の大きなたまねぎです。通常のサイズの２倍！",
        "size_1" => "6kg",
        "content_1" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
        "price_1" => "¥ 6,000",
        "size_2" => "2kg",
        "content_2" => "家庭用サイズ。ダンボール箱、常温便での配送となります。",
        "price_2" => "¥ 2,000"
    ];
    $curryPowder = [
        "name" => "CURRY POWDER",
        "img" => "images/curryPowder.jpg",
        "description" => "本場インドの香り高いカレーパウダーです。お子様にも食べやすい辛さです。",
        "size_1" => "3kg",
        "content_1" => "業務用サイズ。",
        "price_1" => "¥ 1,800",
        "size_2" => "500g",
        "content_2" => "家庭用サイズ。",
        "price_2" => "¥ 300"
    ];
    $meet = [
        "name" => "MEET",
        "img" => "images/meet.png",
        "description" => "鹿児島県産の程よい脂ののったロース肉です。少し大きめの一口サイズにカットしてお届けします！",
        "size_1" => "2kg",
        "content_1" => "業務用サイズ（冷凍）。クール便での配送となります。",
        "price_1" => "¥ 3,000",
        "size_2" => "300g",
        "content_2" => "家庭用サイズ（冷凍）。クール便での配送となります。",
        "price_2" => "¥ 600"
    ];

    $value = $request->get("value");

    if($value === "1"){
        $vegetable = $potatoes;
    }
    if($value === "2"){
        $vegetable = $carrots;
    }
    if($value === "3"){
        $vegetable = $onions;
    }
    if($value === "4"){
        $vegetable = $curryPowder;
    }
    if($value === "5"){
        $vegetable = $meet;
    }

    return view('detail', [
        "vegetable" => $vegetable
    ]);
});
