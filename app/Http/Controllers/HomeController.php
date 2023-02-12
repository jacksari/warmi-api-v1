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

        $data = DB::select("call get_courses();");

        foreach ($data as $key => $value) {
            $value->audiences = json_decode($value->audiences);
            $value->requirements = json_decode($value->requirements);
            $value->methodologies = json_decode($value->methodologies);
            $value->goals = json_decode($value->goals);
            $value->sections = json_decode($value->sections);
        }

        return $data;
    }
}
