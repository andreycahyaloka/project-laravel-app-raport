<?php

use Illuminate\Database\Seeder;

class AccessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('accesses')->insert([
			'name' => 'admin',
		]);

		DB::table('accesses')->insert([
			'name' => 'user',
		]);

		DB::table('accesses')->insert([
			'name' => 'guru',
		]);
    }
}
