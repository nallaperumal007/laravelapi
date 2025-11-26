<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $cat) {
            for ($i = 1; $i <= 10; $i++) {
                Item::create([
                    'category_id' => $cat->id,
                    'name' => $cat->name . " Item $i",
                    'price' => rand(100, 10000) / 10,
                ]);
            }
        }
    }
}
