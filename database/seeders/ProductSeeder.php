<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $subcategoryIds = Subcategory::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            $name = $faker->words(3, true);

            $subcategoryId = $faker->randomElement($subcategoryIds);
            $subcategory = Subcategory::find($subcategoryId);

            Product::create([
                'subcategory_id' => $subcategoryId,
                'category_id' => $subcategory->category_id,
                'name' => ucfirst($name),
                'slug' => Str::slug($name) . '-' . $i,
                'description' => $faker->paragraph,
                'old_price' => $faker->numberBetween(100, 2000),
                'new_price' => $faker->numberBetween(50, 1500),
                'image' => 'default.png', // চাইলে faker->imageUrl() ব্যবহার করতে পারো
            ]);
        }
    }
}
