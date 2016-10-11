<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VegetablesController extends Controller {

    public function getDetail(Request $request) {

        $id = $request->get("id");

        $vegetable = DB::table('vegetables')->where('id', $id)->first();

        return view('detail', [
            "vegetable" => $vegetable
        ]);
    }
}