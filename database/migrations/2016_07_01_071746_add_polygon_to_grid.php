<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPolygonToGrid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE grid ADD COLUMN polygon GEOMETRY(POLYGON, 4326)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grid', function (Blueprint $table) {
            //
            $table->dropColumn('polygon');
        });
    }
}
