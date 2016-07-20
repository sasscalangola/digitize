<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('project_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('level_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('set null');
            $table->foreign('level_id')->references('id')->on('level')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_user');
    }
}
