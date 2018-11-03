<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Question;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('users')->delete();
    	\DB::table('questions')->delete();
    	\DB::table('answers')->delete();

        factory(App\User::class, 3)->create()->each(function($user){
        	$user->questions()->saveMany(
                factory(App\Question::class, rand(1, 5))->make()
            )->each(function($question){
                $question->answers()->saveMany(
                    factory(App\Answer::class, rand(1, 3))->make()
                );
            });
        });
    }
}
