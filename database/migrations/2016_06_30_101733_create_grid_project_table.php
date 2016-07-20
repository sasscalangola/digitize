<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGridProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grid_project', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('project_id')->nullable();
            $table->string('grid_id')->nullable();

            $table->foreign('grid_id')->references('id')->on('grid')->onDelete('set null');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grid_project');
    }
}
