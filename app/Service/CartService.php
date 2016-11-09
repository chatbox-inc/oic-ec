<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;
/**
 * カートの中身を保持するクラス
 */
class CartService
{
    /**
     * カートの中にデータを入れる
     * @param $id
     */
    public function addItem($id){
        $item = DB::table('vegetables')->where('id', $id)->first(); //idが一致するものをvegetableテーブルから検索、取得
        $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
        $items[] = $item; // 取得したデータにオブジェクトを保存
        session()->put("items", $items); //取得したデータをsessionに保存。 $_SESSION["items"] に保存するのと同じ
    }

    public function clear(){
        session()->flush(); //sessionの全データを削除
    }

    public function removeItem($index){
        session()->forget("items.$index"); //sessionから選んだ商品を削除。例えば$items[0]の削除は items.0 と指定できる。
    }

    public function getItems(){
        $items = session()->get("items",[]); //セッションデータを取得、nullの場合は空の配列
        return $items;
    }

}