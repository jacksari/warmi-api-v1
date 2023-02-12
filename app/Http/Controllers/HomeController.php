<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function hola () {
        return "API LARAVEL";
    }

    public function index()
    {

        $data = DB::select("select * from video v;");

        return $data;
    }
}
