<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurux', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nip')->unique();
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
			$table->integer('jenjangstudi_id')->unsigned()->nullable();
			$table->foreign('jenjangstudi_id')->references('id')->on('jenjangstudix')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->string('gelar')->nullable();
			$table->string('tahun_lulus');
			$table->string('no_telp')->nullable();
			$table->integer('status_id')->unsigned()->nullable();
			$table->foreign('status_id')->references('id')->on('statusx')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
			$table->integer('jabatan_id')->unsigned()->nullable();
			$table->foreign('jabatan_id')->references('id')->on('jabatanx')
				->onDelete('CASCADE')
				->onUpdate('CASCADE');
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
        Schema::dropIfExists('gurux');
    }
}
