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
        DB::statement("
            insert into statistics (`number`,name,created_at,updated_at)
            values (100, 'PROYECTOS', now(), now()),
            (25, 'MENTORES', now(), now()),
            (6, 'PAÍSES DE HABLA HISPANA', now(), now()),
            (50, 'CHARLAS', now(), now());
        ");

        DB::statement("
            insert into why_be_part (title, name, created_at, updated_at)
            values ('Acompañamiento','Tenemos un equipo disponible que te ayuda a resolver tus dudas y solicitar ayuda en cualquier momento de tu experiencia.', now(), now()),
            ('Networking', 'Vas a ser parte de una comunidad de emprendedoras como vos, que quiere hacer realidad su idea de emprendimiento.', now(), now());
        ");

        DB::statement("
            insert into reviews (name,country, url, comment,created_at, updated_at)
            values ('Jack Sari', 'PE', 'https://res.cloudinary.com/mikunaalli/image/upload/v1654122331/amg/004-polla_mwaaze.png' , 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.', now(), now()),
            ('Giovana Roque Vargas', 'PE', 'https://res.cloudinary.com/mikunaalli/image/upload/v1654122331/amg/004-polla_mwaaze.png', 'Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.', now(), now());
        ");

        DB::statement("
            insert into allies (name, url, created_at, updated_at)
            values ('MIRO', 'https://bit2bitamericas.com/wp-content/uploads/2020/08/miroo.jpg', now(), now()),
            ('PERU', 'https://i.pinimg.com/originals/6a/f9/4f/6af94f669403a581dfee5d35888ea3b0.jpg', now(), now());
        ");
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
