<?php

use Illuminate\Database\Seeder;

class JabatanxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('jabatanx')->insert([
			'nama' => 'kepala sekolah',
		]);

		DB::table('jabatanx')->insert([
			'nama' => 'wali kelas',
		]);

		DB::table('jabatanx')->insert([
			'nama' => 'guru',
		]);
    }
}
