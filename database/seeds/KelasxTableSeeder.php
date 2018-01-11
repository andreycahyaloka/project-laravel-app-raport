<?php

use Illuminate\Database\Seeder;

class KelasxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('kelasx')->insert([
			'kodekelas' => 'kl001',
			'nama_kelas' => 'kelas X',
		]);

		DB::table('kelasx')->insert([
			'kodekelas' => 'kl002',
			'nama_kelas' => 'kelas XI',
		]);

		DB::table('kelasx')->insert([
			'kodekelas' => 'kl003',
			'nama_kelas' => 'kelas XII',
		]);
    }
}
