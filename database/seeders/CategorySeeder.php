<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
           'name' => 'الفتاوي',
           'name_fr' => 'Fatwas',
           'name_en' => 'Fatwas',
        ]);

        $category = new Category();
        $category -> name = 'news';
        $category->save();


    }
}
