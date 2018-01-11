<?php

use Illuminate\Database\Seeder;

class JenjangstudixTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('jenjangstudix')->insert([
			'nama' => 'SMA',
		]);

		DB::table('jenjangstudix')->insert([
			'nama' => 'SMK',
		]);

		DB::table('jenjangstudix')->insert([
			'nama' => 'S1',
		]);

		DB::table('jenjangstudix')->insert([
			'nama' => 'S2',
		]);
    }
}
