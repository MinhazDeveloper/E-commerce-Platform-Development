<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $subcategories = [
            1 => ['Mobile Phones', 'Laptops', 'Cameras'],
            2 => ['Men Clothing', 'Women Clothing', 'Shoes'],
            3 => ['Fiction', 'Non-Fiction', 'Comics'],
            4 => ['Football', 'Cricket', 'Tennis'],
            5 => ['Sofa', 'Table', 'Chair'],
        ];

        foreach ($subcategories as $category_id => $subs) {
            foreach ($subs as $sub) {
                Subcategory::create([
                    'category_id' => $category_id,
                    'name' => $sub,
                    'slug' => Str::slug($sub),
                ]);
            }
        }
    }
}
