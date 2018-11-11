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
        DB::table('profiles')->truncate();

    	$user = App\User::create([
    		'name' => 'Zarko',
    		'email' => 'zarko.stanisic@live.com',
    		'password' => bcrypt('8panama8'),
            'admin' => 1
    	]);
        //factory('App\User', 3)->create();
        App\Profile::create([
            'avatar' => '1.png',
            'about' => 'about',
            'facebook' => 'facebook',
            'youtube' => 'youtube',
            'user_id' => $user->id

        ]);
    }
}
