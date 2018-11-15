<?php

use Illuminate\Database\Seeder;

class ChannelsDiscusionsRepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->truncate();
    	DB::table('discusions')->truncate();
    	DB::table('replies')->truncate();

        factory(App\Channel::class, rand(3, 5))->create()->each(function($channel){
        	$channel->discusions()->saveMany(factory(App\Discusion::class, rand(3, 5))->make())->each(function($discusion){
        		$discusion->replies()->saveMany(factory(App\Reply::class, rand(3, 5))->make());
        	});
        });
    }
}
