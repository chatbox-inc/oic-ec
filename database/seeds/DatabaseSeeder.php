<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        DB::table('vegetables')->truncate();

        // データ挿入
        $now = Carbon::now();

        $potatoes = [
            "name" => "POTATOES",
            "kana" => "じゃがいも",
            "img" => "images/potatoes.jpg",
            "description" => "北海道産の大地でとれたおいしいじゃがいもです。カレーにはメークインよりもホクホクとした男爵いもがピッタリ！",
            "size" => "5kg",
            "contents" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
            "price" => 5300,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $carrots = [
            "name" => "CARROTS",
            "kana" => "にんじん",
            "img" => "images/carrot.jpg",
            "description" => "青森県産のにんじんです。土のついた採れたてのものをお届けします！",
            "size" => "6kg",
            "contents" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
            "price" => 5400,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $onions = [
            "name" => "ONIONS",
            "kana" => "たまねぎ",
            "img" => "images/onion.jpg",
            "description" => "北海道産の大きなたまねぎです。通常のサイズの２倍！",
            "size" => "6kg",
            "contents" => "業務用サイズ。ダンボール箱、常温便での配送となります。",
            "price" => 6000,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $curryPowder = [
            "name" => "CURRY POWDER",
            "kana" => "カレー粉",
            "img" => "images/curryPowder.jpg",
            "description" => "本場インドの香り高いカレーパウダーです。お子様にも食べやすい辛さです。",
            "size" => "3kg",
            "contents" => "業務用サイズ。",
            "price" => 1800,
            "created_at" => $now,
            "updated_at" => $now
        ];
        $meet = [
            "name" => "MEET",
            "kana" => "お肉",
            "img" => "images/meet.png",
            "description" => "鹿児島県産の程よい脂ののったロース肉です。少し大きめの一口サイズにカットしてお届けします！",
            "size" => "2kg",
            "contents" => "業務用サイズ（冷凍）。クール便での配送となります。",
            "price" => 3000,
            "created_at" => $now,
            "updated_at" => $now
        ];

        DB::table('vegetables')->insert([$potatoes, $carrots, $onions, $curryPowder, $meet]);
    }
}
