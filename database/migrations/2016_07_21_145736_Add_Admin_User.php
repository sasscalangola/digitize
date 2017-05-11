<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([array(
            'name' => 'David Elizalde',
            'email'=> 'delicast@gmail.com',
            'password'=> '$2y$10$GqEl8iB2wy8SfemLTasJyO.T2JHFqtMIBeGlXhtlES7qYz/yLgAHC',
            'admin'=> '1',
            'remember_token'=>'OPEa26wqpXQy1WlnqGRfwStX6ESEiOlvLQTI5Aec1Xtt8hdkldGzOWf9uzzO',
            'created_at' => '2016-07-21 15:55:48',
            'updated_at' => '2016-07-21 15:55:48',
            'type'=> '0',

        )]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
