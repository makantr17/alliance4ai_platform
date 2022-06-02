<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_accesses', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin');
            $table->boolean('grant_user_topic');
            $table->boolean('grant_user_discussion');
            $table->boolean('grant_user_circles');
            $table->boolean('grant_user_learning');
            $table->boolean('grant_user_hackerthon');
            $table->boolean('delete_user_topic');
            $table->boolean('delete_user_discussion');
            $table->boolean('delete_user_circles');
            $table->boolean('delete_learning');
            $table->boolean('delete_hackerthon');
            $table->boolean('is_root');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('role_accesses');
    }
}
