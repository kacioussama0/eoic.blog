<?php

namespace Database\Seeders;

use App\Models\Category;
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
        'name' => 'أخر الأخبار',
        'name_fr' => 'Actualités',
        'name_en' => 'Latest News',
        ]);

        Category::create([
            'name' => 'إتفاقيات',
            'name_fr' => 'Conventions',
            'name_en' => 'Conventions',
        ]);

        Category::create([
            'name' => 'المؤتمرات',
            'name_fr' => 'Conférences',
            'name_en' => 'Conferences',
        ]);


        Category::create([
            'name' => 'ورش العمل ',
            'name_fr' => 'Workshops',
            'name_en' => 'Ateliers',
        ]);

        Category::create([
            'name' => 'الدورات',
            'name_fr' => 'Courses',
            'name_en' => 'Cours',
        ]);

        Category::create([
            'name' => 'بيانات الهيئة',
            'name_fr' => 'Rapports',
            'name_en' => 'Statements',
        ]);

        Category::create([
            'name' => 'نشاطات',
            'name_fr' => 'Activités',
            'name_en' => 'Activities',
        ]);


        Category::create([
           'name' => 'الفتاوي',
           'name_fr' => 'Fatawy',
           'name_en' => 'Fatawy',
        ]);



        Category::create([
            'name' => 'الهيئة في أعين الإعلام',
            'name_fr' => 'L’Organisation aux yeux des médias',
            'name_en' => 'The organization seen by people',
        ]);


        Category::create([
            'name' => 'مطويات',
            'name_fr' => 'Dépliants',
            'name_en' => 'Brochures',
        ]);

        Category::create([
            'name' => 'حوارات',
            'name_fr' => 'Dialogues',
            'name_en' => 'Dialogues',
        ]);

        Category::create([
            'name' => 'مقالات',
            'name_fr' => 'Articles',
            'name_en' => 'Articles',
        ]);

        Category::create([
            'name' => '	نشاطات رئيس الهيئة',
            'name_fr' => 'Activités du président',
            'name_en' => 'President Activities',
        ]);

    }
}
