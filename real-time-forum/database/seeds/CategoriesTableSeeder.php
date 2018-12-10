<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 5)->create();
    }
}
