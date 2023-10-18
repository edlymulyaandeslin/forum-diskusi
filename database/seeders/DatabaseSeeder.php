<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();

        User::create([
            'name' => 'Edly Mulya Andeslin',
            'username' => 'edlymulyaandeslin',
            'umur' => mt_rand(10, 20),
            'alamat' => fake()->address(),
            'bio' => 'Student',
            'email' => 'edlymulyaandeslin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
        Category::create([
            'name' => 'Web design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Copy Writer',
            'slug' => 'copy-writer'
        ]);

        Question::factory(5)->create();

        Comment::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
