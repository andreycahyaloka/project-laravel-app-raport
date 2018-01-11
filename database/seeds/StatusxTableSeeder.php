<?php

use Illuminate\Database\Seeder;

class StatusxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('statusx')->insert([
			'nama' => 'sudah kawin',
		]);

		DB::table('statusx')->insert([
			'nama' => 'belum kawin',
		]);
    }
}
