<?php

use Illuminate\Database\Seeder;

class JeniskelaminxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('jeniskelaminx')->insert([
			'nama' => 'laki-laki',
		]);

		DB::table('jeniskelaminx')->insert([
			'nama' => 'perempuan',
		]);
    }
}
