<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//
		DB::table('users')->insert([
			'access_id' => '1',
			'username' => 'usernameadmin1',
			'email' => 'admin1'.'@email.com',
			'password' => bcrypt('passwordadmin1'),
		]);

		DB::table('users')->insert([
			'access_id' => '2',
			'username' => 'usernameuser1',
			'email' => 'user1'.'@email.com',
			'password' => bcrypt('passworduser1'),
		]);
    }
}
