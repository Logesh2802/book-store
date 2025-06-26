<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();

        Book::insert([
            [
                'title' => 'Laravel for Beginners',
                'description' => 'An easy guide to learn Laravel framework.',
                'author' => 'John Doe',
                'price' => 499.00,
                'available' => true,
                'category_id' => $categories[0] ?? 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mastering PHP',
                'description' => 'Deep dive into core PHP concepts and practices.',
                'author' => 'Jane Smith',
                'price' => 399.00,
                'available' => true,
                'category_id' => $categories[1] ?? 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Eloquent ORM Essentials',
                'description' => 'Learn database operations using Eloquent in Laravel.',
                'author' => 'Alex Rider',
                'price' => 299.50,
                'available' => false,
                'category_id' => $categories[2] ?? 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
