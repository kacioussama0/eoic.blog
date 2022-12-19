<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
       $owner = User::create([
           'name' => 'eoic',
           'email' => 'admin@eoic.org',
           'password' => bcrypt('eoic.admin'),
           'avatar' => '',
       ]);

    }
}
