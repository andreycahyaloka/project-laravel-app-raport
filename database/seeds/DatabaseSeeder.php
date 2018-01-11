<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// $this->call(UsersTableSeeder::class);

		$this->call(JeniskelaminxTableSeeder::class);
		$this->call(AgamaxTableSeeder::class);

		$this->call(JurusanxTableSeeder::class);

		$this->call(JenjangstudixTableSeeder::class);
		$this->call(StatusxTableSeeder::class);
		$this->call(JabatanxTableSeeder::class);

		$this->call(MapelxTableSeeder::class);
		$this->call(KelasxTableSeeder::class);

		$this->call(AdminsTableSeeder::class);
		$this->call(GuruxTableSeeder::class);
		$this->call(SiswaxTableSeeder::class);
    }
}
