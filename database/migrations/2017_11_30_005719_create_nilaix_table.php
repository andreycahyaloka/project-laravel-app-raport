<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaix', function (Blueprint $table) {
            $table->increments('id');
			$table->string('kodenilai')->unique();
			$table->integer('guru_nip_id')->unsigned();
			$table->foreign('guru_nip_id')->references('id')->on('gurux')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->integer('mapel_kodemapel_id')->unsigned();
			$table->foreign('mapel_kodemapel_id')->references('id')->on('mapelx')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->integer('kelas_kodekelas_id')->unsigned();
			$table->foreign('kelas_kodekelas_id')->references('id')->on('kelasx')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
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
        Schema::dropIfExists('nilaix');
    }
}
