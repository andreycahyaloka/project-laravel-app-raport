<?php

use Illuminate\Database\Seeder;

class MapelxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('mapelx')->insert([
			'kodemapel' => 'mp001',
			'nama_mapel' => 'bahasa inggris',
			'tahun_ajaran' => '2013/2014',
			'semester' => 'ganjil',
		]);

		DB::table('mapelx')->insert([
			'kodemapel' => 'mp002',
			'nama_mapel' => 'matematika',
			'tahun_ajaran' => '2013/2014',
			'semester' => 'ganjil',
		]);

		DB::table('mapelx')->insert([
			'kodemapel' => 'mp003',
			'nama_mapel' => 'bahasa indonesia',
			'tahun_ajaran' => '2013/2014',
			'semester' => 'ganjil',
		]);

		DB::table('mapelx')->insert([
			'kodemapel' => 'mp004',
			'nama_mapel' => 'seni budaya',
			'tahun_ajaran' => '2013/2014',
			'semester' => 'ganjil',
		]);

		DB::table('mapelx')->insert([
			'kodemapel' => 'mp005',
			'nama_mapel' => 'bahasa arab',
			'tahun_ajaran' => '2013/2014',
			'semester' => 'ganjil',
		]);
    }
}
