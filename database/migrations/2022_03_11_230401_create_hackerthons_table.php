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
            $table->string('title');
            $table->string('category');
            $table->string('subtitle1');
            $table->text('description1');
            $table->string('subtitle2')->nullable();
            $table->text('description2')->nullable();
            
            $table->string('images')->nullable();
            $table->text('instructions');
            $table->text('evaluation')->nullable();
            $table->text('rules')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('limit_group')->nullable();

            $table->string('first_prize')->nullable();
            $table->string('second_prize')->nullable();
            $table->string('third_prize')->nullable();

            $table->string('start_date');
            $table->string('deadline');

            $table->string('link1')->nullable();
            $table->string('link2')->nullable();

            $table->boolean('isvalidate');
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
