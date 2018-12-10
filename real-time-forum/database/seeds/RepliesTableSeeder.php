<?php

use Illuminate\Database\Seeder;
use App\Model\Reply;
use App\Model\Like;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reply::class, 50)->create()->each(function($reply){
        	return $reply->likes()->save(factory(Like::class)->make());
        });
    }
}
