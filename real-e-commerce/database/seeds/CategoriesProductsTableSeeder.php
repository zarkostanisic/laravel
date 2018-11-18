<?php

use Illuminate\Database\Seeder;

class CategoriesProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categories')->truncate();
    	DB::table('products')->truncate();

        factory('App\Category', 3)->create()->each(function($category){
        	$category->products()->saveMany(factory('App\Product', 100)->make());
        });
    }
}
