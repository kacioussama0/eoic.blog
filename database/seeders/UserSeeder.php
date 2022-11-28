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
           'name' => 'owner',
           'email' => 'owner@owner.com',
           'password' => bcrypt('owner'),
           'avatar' => '',
       ]);

       $owner->attachRole('admin');

        $writer = User::create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => bcrypt('writer'),
            'avatar' => '',
        ]);

        $writer->attachRole('writer');

    }
}
