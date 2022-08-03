<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'name' => 'design interior',
            'flag' => 1
        ]);

        App\Category::create([
            'name' => 'product',
            'flag' => 2
        ]);

        App\Category::create([
            'name' => 'furniture',
            'flag' => 3
        ]);

        App\Category::create([
            'name' => 'finishing',
            'flag' => 4
        ]);
    }
}
