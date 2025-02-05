<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $categoryId = rand(1, 5);  
            Course::create([
                'user_id' =>1,
                'category_id' => $categoryId, 
                'title' => $faker->sentence(5),
                'slug' => Str::slug($faker->sentence(5)),
                'overview' => $faker->paragraph(),
                'hours' => $faker->randomNumber(2),
                'price' => $faker->randomFloat(2, 10, 1000),  
                'gst' => $faker->boolean(),
                'students' => $faker->randomNumber(2),
                'class_type' => $faker->word(),
                'placements' => $faker->boolean(),
                'featured_image' => $this->generateFakeImage(),  
                'active' => $faker->boolean(),
                'keywords' => implode(',', $faker->words(5)),
                'description' => $faker->paragraph(),
                'page_title' => $faker->sentence(),
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
        $imagePath = 'courses/' . $imageName;
        Storage::disk('public')->put($imagePath, file_get_contents('https://picsum.photos/640/480'));
        return $imagePath;
    }
}
