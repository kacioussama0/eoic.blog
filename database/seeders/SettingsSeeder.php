<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'blog_name' => 'مرصد اليقظة لحقوق الإنسان والقضايا العادلة',
            'phone' => '0782022754',
            'email' => 'marsadelyakada@gmail.com',
            'address' => 'تعاونية الرحمة فيلا 14 الينابيع بئر مراد رايس',

        ]);
    }
}
