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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();


            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->text('description');
            $table->text('objetive')->nullable();
            $table->text('resume');

            $table->string('video')->nullable();
            $table->string('image')->nullable();

            $table->enum('status', [
                'BORRADOR',
                'PUBLICADO',
                'REVISION'
            ])->default('BORRADOR');

            $table->string('slug')->unique();

            // $table->unsignedBigInteger('level_id')->nullable();
            // $table->unsignedBigInteger('category_id')->nullable();

            // $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
