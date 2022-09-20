<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(1)
            ->create()
            ->each(function ($category) {
                SubCategory::factory(1)
                    ->create(['category_id' => $category->id])
                    ->each(function ($subCategory) {
                        SubSubcategory::factory(1)
                            ->create([
                                'subcategory_id' => $subCategory->id
                            ]);
                    });
            });
    }
}
