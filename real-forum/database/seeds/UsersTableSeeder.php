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
        DB::table('users')->truncate();

        App\User::create([
        	'name' => 'Zarko Stanisic',
        	'email' => 'zarko.stanisic@live.com',
        	'password' => bcrypt('8panama8'),
        	'admin' => 1
        ]);

        factory('App\User', 10)->create();
    }
}
