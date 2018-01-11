<?php

use Illuminate\Database\Seeder;

class SiswaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('siswax')->insert([
			'nis' => '110403020051',
			'nama_lengkap' => 'siswa',
			'tempat_lahir' => 'siswa',
			'tgl_lahir' => '01/12/2017',
			'alamat' => 'siswa',
			'jeniskelamin_id' => '1',
			'agama_id' => '1',
			'jurusan_id' => '1',
			'tahun_masuk' => '2017',
			'email' => 'siswa1'.'@email.com',
			'password' => bcrypt('passwordsiswa1'),
		]);

		DB::table('siswax')->insert([
			'nis' => '110403020052',
			'nama_lengkap' => 'siswa',
			'tempat_lahir' => 'siswa',
			'tgl_lahir' => '01/12/2017',
			'alamat' => 'siswa',
			'jeniskelamin_id' => '2',
			'agama_id' => '2',
			'jurusan_id' => '2',
			'tahun_masuk' => '2017',
			'email' => 'siswa2'.'@email.com',
			'password' => bcrypt('passwordsiswa2'),
		]);

		DB::table('siswax')->insert([
			'nis' => '110403020053',
			'nama_lengkap' => 'siswa',
			'tempat_lahir' => 'siswa',
			'tgl_lahir' => '01/12/2017',
			'alamat' => 'siswa',
			'jeniskelamin_id' => '1',
			'agama_id' => '3',
			'jurusan_id' => '3',
			'tahun_masuk' => '2017',
			'email' => 'siswa3'.'@email.com',
			'password' => bcrypt('passwordsiswa3'),
		]);
    }
}
