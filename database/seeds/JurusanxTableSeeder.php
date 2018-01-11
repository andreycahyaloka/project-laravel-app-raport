<?php

use Illuminate\Database\Seeder;

class JurusanxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('jurusanx')->insert([
			'nama' => 'animasi',
		]);

		DB::table('jurusanx')->insert([
			'nama' => 'multimedia',
		]);

		DB::table('jurusanx')->insert([
			'nama' => 'rekayasa perangkat lunak',
		]);

		DB::table('jurusanx')->insert([
			'nama' => 'teknik eletronika',
		]);

		DB::table('jurusanx')->insert([
			'nama' => 'teknik gambar bangunan',
		]);

		DB::table('jurusanx')->insert([
			'nama' => 'teknik komputer dan jaringan',
		]);

		DB::table('jurusanx')->insert([
			'nama' => 'teknik mesin',
		]);

		DB::table('jurusanx')->insert([
			'nama' => 'teknik otomitif',
		]);
    }
}
