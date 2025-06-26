<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Category::insert([
            [ 'name' => 'Web Development', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'Programming Languages', 'created_at' => now(), 'updated_at' => now() ],
            [ 'name' => 'Databases', 'created_at' => now(), 'updated_at' => now() ],
        ]);
    }
}
