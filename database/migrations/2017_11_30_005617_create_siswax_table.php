<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswax', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nis')->unique();
			$table->string('nama_lengkap');
			$table->string('tempat_lahir');
			$table->string('tgl_lahir');
			$table->string('alamat');
			$table->integer('jeniskelamin_id')->unsigned()->nullable();
			$table->foreign('jeniskelamin_id')->references('id')->on('jeniskelaminx')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->integer('agama_id')->unsigned()->nullable();
			$table->foreign('agama_id')->references('id')->on('agamax')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->integer('jurusan_id')->unsigned()->nullable();
			$table->foreign('jurusan_id')->references('id')->on('jurusanx')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->string('tahun_masuk');
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
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
        Schema::dropIfExists('siswax');
    }
}
