<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('content');

            $table->string('subtitle1')->nullable();
            $table->longText('description1')->nullable();
            $table->longText('code1')->nullable();
            $table->longText('link1')->nullable();

            $table->string('subtitle2')->nullable();
            $table->longText('description2')->nullable();
            $table->longText('code2')->nullable();
            $table->longText('link2')->nullable();

            $table->string('subtitle3')->nullable();
            $table->longText('description3')->nullable();
            $table->longText('code3')->nullable();
            $table->longText('link3')->nullable();

            $table->boolean('status');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('lessons');
    }
}
