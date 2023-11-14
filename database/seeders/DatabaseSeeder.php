<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Article::factory()->count(20)->create();

        \App\Models\Article::factory(20)->create();
        \App\Models\Comment::factory(40)->create();

        \App\Models\User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
        ]);

        $list = ['News', 'Tech', 'Mobile', 'Desktop', 'Web'];
        foreach($list as $name) {
            \App\Models\Category::create(['name' => $name]);
        }
    }
}
