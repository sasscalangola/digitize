<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IntitLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('level')->insert([array(
            'id' => 0,
            'description' => 'Digitizator'

        ),array(
            'id' => 1,
            'description' => 'Results Observer'

        ),array(
            'id' => 2,
            'description' => 'Project Manager'

        )]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
