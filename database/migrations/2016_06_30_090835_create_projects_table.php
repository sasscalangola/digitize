<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name');
            $table->string('nature'); // Public or Private
            $table->string('description')->nullable();
            $table->decimal('area')->nullable(); // in Sqr Km
            $table->integer('qlty_times_per_image')->default(1); // Number of times each image must be processed to considered complete

        });
        DB::statement("ALTER TABLE project ADD COLUMN polygon_area GEOMETRY(POLYGON, 4326)");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project');
    }
}
