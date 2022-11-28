<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'test',
            'slug' => 'test',
            'category_id' => 1,
            'content' => 'lorem ipqsd$
            qsdsqdspqspqsdqdpsppksdpkspqspdqkkppk',
            'is_published' => 'on',
            'created_by' => 1,
            'image' => 'imgs/logo.svg'
        ]);

        Post::create([
            'title' => 'test1',
            'slug' => 'test1',
            'category_id' => 2,
            'content' => 'lorem ipqsd$
            qsdsqdspqspqsdqdpsppkqsdqsdqsdsdpkspqspdqkkppk',
            'is_published' => 'on',
            'created_by' => 1,

            'image' => 'imgs/logo.svg'
        ]);

        Post::create([
            'title' => 'test3',
            'slug' => 'test3',
            'category_id' => 1,
            'content' => 'lorem ipqsd$
            sdqsdqsdqsdqsdqsdqsdqsd',
            'created_by' => 1,
            'is_published' => 'on',
            'image' => 'imgs/logo.svg'
        ]);
    }
}
