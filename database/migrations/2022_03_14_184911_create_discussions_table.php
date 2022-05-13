<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description');
            $table->string('category');
            $table->string('location');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('admin_1');
            $table->string('admin_2')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('link')->nullable();
            $table->string('files')->nullable();
            $table->string('peoples')->nullable();
            $table->string('groups')->nullable();
            $table->date('date');
            $table->boolean('status');
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
        Schema::dropIfExists('discussions');
    }
}
