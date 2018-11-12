<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();

        App\Setting::create([
        	'site_name' => 'Blog',
        	'contact_number' => '12345678',
        	'contact_email' => 'a@a.a',
        	'address' => 'address'
        ]);
    }
}
