<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Product;
use Faker\Factory;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
//         \App\Models\User::factory(10)->create();
//         \App\Models\User::factory()->create([
//             'name' => 'Admin User',
//             'email' => 'admin@mailinator.com',
//             'password' => Hash::make("123456")
//         ]);
       Category::factory(10)->create()->each(function ($category) {
            // Create 100 products for each category
            Product::factory(1000)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
