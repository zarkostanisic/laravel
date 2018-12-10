<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Zarko Stanisic',
    		'email' => 'zarko.stanisic@live.com',
    		'password' => bcrypt('secret')
    	]);

        factory(User::class, 10)->create();
    }
}
