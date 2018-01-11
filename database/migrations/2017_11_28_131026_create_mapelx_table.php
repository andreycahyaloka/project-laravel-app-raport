<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapelxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapelx', function (Blueprint $table) {
            $table->increments('id');
			$table->string('kodemapel')->unique();
			$table->string('nama_mapel');
			$table->string('tahun_ajaran');
			$table->string('semester');
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
        Schema::dropIfExists('mapelx');
    }
}
