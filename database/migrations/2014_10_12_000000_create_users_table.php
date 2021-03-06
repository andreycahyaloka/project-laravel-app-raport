<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			// $table->integer('access_id')->unsigned();
			// $table->foreign('access_id')->references('id')->on('accesses')
			// 	->onDelete('CASCADE')
			// 	->onUpdate('CASCADE');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
