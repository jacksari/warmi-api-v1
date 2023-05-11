<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function hola()
    {
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

    public function home()
    {
        $statistics = DB::select("select s.id, s.`number`, s.name from statistics s;");
        $why_be_part = DB::select("select wbp.id , wbp.title, wbp.name from why_be_part wbp;");
        $reviews = DB::select("select r.id, r.name, r.url, r.country, r.comment from reviews r;");
        $allies = DB::select("select a.id, a.name, a.url from allies a;");

        return response()->json([
            'statistics' => $statistics,
            'why_be_part' => $why_be_part,
            'reviews' => $reviews,
            'allies' => $allies
        ]);
    }
}
