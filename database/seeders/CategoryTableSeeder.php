<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    public $categories = ['java','dsa','devops','aws','web'];
    /**
     * Run the database seeds.
     */
    public function run(Category $category): void
    {
        foreach ($this->categories as $cat)
        {
            $category->create([
                'name' => $cat,
                'slug' => Str::slug($cat,'-')
            ]);
        }
    }
}
