<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $categoryId = rand(1, 5);  
            Post::create([
                'user_id' =>1,
                'category_id' => $categoryId, 
                'title' => $faker->sentence(5),
                'slug' => Str::slug($faker->sentence(5)),
                'body' => $faker->paragraph(),
                'featured_image' => $this->generateFakeImage(),  
                'active' => $faker->boolean(),
                'hits' => $faker->randomNumber(2),
                'reading_time' => $faker->boolean(),
                'shared' => $faker->randomnumber(),
                'keywords' => implode(',', $faker->words(5)),
                'description' => $faker->paragraph(),
                
            ]);
        }
    }

    /**
     * Generate a fake image path for the featured_image attribute.
     *
     * @return string
     */
    private function generateFakeImage()
    {
        $imageName = Str::random(10) . '.jpg';
        $imagePath = 'posts/' . $imageName;
        Storage::disk('public')->put($imagePath, file_get_contents('https://picsum.photos/640/480'));
        return $imagePath;
    }
}

