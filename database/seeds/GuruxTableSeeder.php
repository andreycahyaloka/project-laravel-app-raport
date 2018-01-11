<?php

use Illuminate\Database\Seeder;

class GuruxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('gurux')->insert([
			'nip' => '110403020051',
			'nama_lengkap' => 'guru',
			'tempat_lahir' => 'guru',
			'tgl_lahir' => '01/12/2017',
			'alamat' => 'guru',
			'jeniskelamin_id' => '1',
			'agama_id' => '1',
			'jenjangstudi_id' => '1',
			'gelar' => '-',
			'tahun_lulus' => '2017',
			'no_telp' => '-',
			'status_id' => '1',
			'jabatan_id' => '1',
			'email' => 'guru1'.'@email.com',
			'password' => bcrypt('passwordguru1'),
		]);

		DB::table('gurux')->insert([
			'nip' => '110403020052',
			'nama_lengkap' => 'guru',
			'tempat_lahir' => 'guru',
			'tgl_lahir' => '01/12/2017',
			'alamat' => 'guru',
			'jeniskelamin_id' => '2',
			'agama_id' => '2',
			'jenjangstudi_id' => '2',
			'gelar' => '-',
			'tahun_lulus' => '2017',
			'no_telp' => '-',
			'status_id' => '2',
			'jabatan_id' => '2',
			'email' => 'guru2'.'@email.com',
			'password' => bcrypt('passwordguru2'),
		]);

		DB::table('gurux')->insert([
			'nip' => '110403020053',
			'nama_lengkap' => 'guru',
			'tempat_lahir' => 'guru',
			'tgl_lahir' => '01/12/2017',
			'alamat' => 'guru',
			'jeniskelamin_id' => '1',
			'agama_id' => '3',
			'jenjangstudi_id' => '3',
			'gelar' => '-',
			'tahun_lulus' => '2017',
			'no_telp' => '-',
			'status_id' => '1',
			'jabatan_id' => '3',
			'email' => 'guru3'.'@email.com',
			'password' => bcrypt('passwordguru3'),
		]);
    }
}
