<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHackerthonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hackerthons', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('category');
            $table->text('description');
            $table->text('instructions');
            $table->text('tasks');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('limit_group');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('finish_at')->nullable();
            $table->string('ressources')->nullable();
            $table->boolean('isavailable');
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
        Schema::dropIfExists('hackerthons');
    }
}
