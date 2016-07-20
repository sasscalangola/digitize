<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->integer('user_id')->nullable();
            $table->integer('grid_digitize_id')->nullable();

            $table->date('image_date_min')->nullable();
            $table->date('image_date_max')->nullable();
            $table->integer('type')->default(0);

            
            $table->foreign('grid_digitize_id')->references('id')->on('grid_digitize')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');


        });

        DB::statement("ALTER TABLE household ADD COLUMN point GEOMETRY(POINT, 4326)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('household');
    }
}
