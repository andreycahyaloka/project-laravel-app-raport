<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailnilaixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailnilaix', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('nilai_kodenilai_id')->unsigned();
			$table->foreign('nilai_kodenilai_id')->references('id')->on('nilaix')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->integer('siswa_nis_id')->unsigned();
			$table->foreign('siswa_nis_id')->references('id')->on('siswax')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->string('nilai_tugas');
			$table->string('nilai_ulangan');
			$table->string('nilai_uts');
			$table->string('nilai_uas');
			$table->string('nilai_akhir');
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
        Schema::dropIfExists('detailnilaix');
    }
}
