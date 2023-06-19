<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            $value->methodologies = json_decode($value->methodologies);
            $value->sections = json_decode($value->sections);
        }

        return response()->json([
            'data' => $data,
        ]);
    }

    public function home()
    {
        $statistics = DB::select("select s.id, s.`number`, s.name from statistics s;");
        $why_be_part = DB::select("select wbp.id , wbp.title, wbp.name from why_be_part wbp;");
        $reviews = DB::select("select r.id, r.name, r.url, r.country, r.comment from reviews r;");
        $allies = DB::select("select a.id, a.name, a.url from allies a;");
        $courses = DB::select("select 
                c.title,
                c.subtitle,
                c.description,
                c.objetive,
                c.resume,
                c.slug,
                c.image,
                meto.methodologies
            from courses c
            join (
                select json_arrayagg(m.name) methodologies, m.course_id from methodologies m 
                group by m.course_id
            ) meto on meto.course_id = c.id");

        return response()->json([
            'statistics' => $statistics,
            'why_be_part' => $why_be_part,
            'reviews' => $reviews,
            'allies' => $allies,
            'courses' => $courses
        ]);
    }

    public function insertCourse(Request $request)
    {
        // return Str::of($request->title)->slug('-');
        try {
            DB::statement("call insert_course(?,?,?,?,?,?,?,?,?);", [
                $request->title,
                $request->description,
                $request->subtitle,
                $request->objetive,
                $request->resume,
                $request->image,
                Str::of($request->title)->slug('-'),
                json_encode($request->sections),
                json_encode($request->methodologies)
            ]);
            return response()->json([
                'message' => 'success',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'error',
            ]);
        }
    }
    

    public function insertFormLanding(Request $request)
    {
        DB::statement("call insert_form (?,?,?,?,?);", [
            $request->name,
            $request->email,
            $request->type,
            $request->message,
            $request->course
        ]);
        return response()->json([
            'message' => 'success',
        ]);
    }
}
