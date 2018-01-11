<?php

use Illuminate\Database\Seeder;

class AgamaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('agamax')->insert([
			'nama' => 'islam',
		]);

		DB::table('agamax')->insert([
			'nama' => 'kristen',
		]);

		DB::table('agamax')->insert([
			'nama' => 'katolik',
		]);

		DB::table('agamax')->insert([
			'nama' => 'hindu',
		]);

		DB::table('agamax')->insert([
			'nama' => 'budha',
		]);

		DB::table('agamax')->insert([
			'nama' => 'kong hu cu',
		]);
    }
}
