<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('topic_id')->constrained()->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('file')->nullable();
            $table->string('title');
            $table->string('link');
            $table->text('description')->nullable();
            $table->string('author')->nullable();
            $table->text('link_auth')->nullable();
            $table->string('subtitle_1')->nullable();
            $table->text('detail_1')->nullable();
            $table->string('subtitle_2')->nullable();
            $table->text('detail_2')->nullable();
            $table->string('subtitle_3')->nullable();
            $table->text('detail_3')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
