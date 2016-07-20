<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGridDigitizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grid_digitize', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('project_id')->nullable();
            $table->string('grid_id')->nullable();
            $table->integer('user_id')->nullable();

            $table->string('user_ip')->nullable();
            $table->string('image_source')->nullable();
            $table->date('image_date_min')->nullable();
            $table->date('image_date_max')->nullable();
            $table->integer('num_houses');
            $table->integer('bad_quality');
            $table->integer('zoom')->nullable();


            $table->foreign('grid_id')->references('id')->on('grid')->onDelete('set null');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grid_digitize');
    }
}
