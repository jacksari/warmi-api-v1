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
        $procedure = "create procedure insert_course(
            in t_title varchar(255),
            in t_description text,
            in t_subtitle text,
            in t_objetive text,
            in t_resume text,
            in t_image text,
            in t_slug varchar(255),
            in t_sections json,
            in t_methodologies json
        )
        begin

        START TRANSACTION;

		insert into courses (
			title, 
			description ,
			objetive ,
			subtitle,
			resume ,
			image ,
			status ,
			slug ,
			created_at ,
			updated_at 
		) values (
			t_title,
			t_description,
			t_objetive,
			t_subtitle,
			t_resume,
			t_image,
			2,
			t_slug,
			now(),
			now()
		);
	
			set @course_id = @@identity;
	
		    set @i = 0;
		    set @count_js = JSON_LENGTH(t_sections);
		    while @i < @count_js do 
		          set @name_section = JSON_UNQUOTE(JSON_EXTRACT(t_sections, concat('$[', @i ,'].name')));
		          set @lessons = JSON_UNQUOTE(JSON_EXTRACT(t_sections, concat('$[', @i ,'].lessons')));
		         set @description = JSON_UNQUOTE(JSON_EXTRACT(t_sections, concat('$[', @i ,'].description')));
		         
		         	insert into sections (name, course_id, description) values (@name_section, @course_id, @description);
		         
		         	set @section_id = @@identity;
		         
		         	set @j = 0;
				    set @count_j = JSON_LENGTH(@lessons);
				    while @j < @count_j do 
				          set @name_lesson = JSON_UNQUOTE(JSON_EXTRACT(@lessons, concat('$[', @j ,']')));
				         
				         	insert into lessons (name, section_id) values (@name_lesson, @section_id);
				         
				          set @j = @j + 1;
				    end while;
		         	
		         
		          set @i = @i + 1;
		    end while;
		   
		   	set @z = 0;
		    set @count_z = JSON_LENGTH(t_methodologies);
		    while @z < @count_z do 
		          set @name_meto = JSON_UNQUOTE(JSON_EXTRACT(t_methodologies, concat('$[', @z ,']')));
		         
		         insert into methodologies (name, course_id) values (@name_meto, @course_id);
		         
		          set @z = @z + 1;
		    end while;
		   
    COMMIT; 
         
        END";

        DB::unprepared("DROP procedure IF EXISTS insert_course");
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
