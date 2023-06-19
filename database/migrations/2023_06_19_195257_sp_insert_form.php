<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        $procedure = "create procedure insert_form(
            in t_name varchar(255),
            in t_email varchar(255),
            in t_type varchar(255),
            in t_message text,
            in t_course varchar(255)
        )
        begin

            insert into form_landings (name,email,`type`,message,course,created_at,updated_at)
            values (t_name,t_email,t_type,t_message,t_course, now(), now());
     
        END";

        DB::unprepared("DROP procedure IF EXISTS insert_form");
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
