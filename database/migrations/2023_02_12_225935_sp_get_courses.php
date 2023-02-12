<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "create procedure get_courses()
        begin
            select 
                c.title,
                c.subtitle,
                c.description,
                c.slug,
                c.image,
                c2.name category_name,
                l.name level_name,
                au.audiences,
                rq.requirements,
                meto.methodologies,
                `go`.goals,
                se.sections
            from courses c
            join categories c2 on c2.id = c.category_id 
            join levels l on l.id = c.level_id 
            join (
                select json_arrayagg(a.name) audiences, a.course_id from audiences a
                group by a.course_id
            ) au on au.course_id = c.id
            join (
                select json_arrayagg(r.name) requirements, r.course_id from requirements r
                group by r.course_id
            ) rq on rq.course_id = c.id
            join (
                select json_arrayagg(m.name) methodologies, m.course_id from methodologies m 
                group by m.course_id
            ) meto on meto.course_id = c.id
            join (
                select json_arrayagg(g.name) goals, g.course_id from goals g 
                group by g.course_id
            ) `go` on `go`.course_id = c.id
            join (
                select 
                    json_arrayagg(
                        json_object(
                            'name', sec.section_name,
                            'lessons', sec.lessons
                        )	
                    )  sections,
                    sec.course_id
                from (
                    select s.name section_name, le.lessons, s.course_id from sections s
                    join (
                        select json_arrayagg(l.name) lessons, l.section_id 
                        from lessons l
                        group by l.section_id
                    ) le on le.section_id = s.id
                ) sec
                group by sec.course_id
            ) se on se.course_id = c.id;
        END";

        DB::unprepared("DROP procedure IF EXISTS get_courses");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
