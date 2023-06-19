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
        c.objetive,
        c.resume,
        c.slug,
        c.image,
        meto.methodologies,
        se.sections
    from courses c
    join (
        select json_arrayagg(m.name) methodologies, m.course_id from methodologies m 
        group by m.course_id
    ) meto on meto.course_id = c.id
    join (
        select 
            json_arrayagg(
                json_object(
                    'name', sec.section_name,
                    'lessons', sec.lessons,
                    'description', sec.description
                )	
            )  sections,
            sec.course_id
        from (
            select s.name section_name, le.lessons, s.course_id, s.description from sections s
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
