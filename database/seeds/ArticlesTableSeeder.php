<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $userIds = \App\Models\User::pluck('id')->toArray();
        $tagIds = \App\Models\Tag::pluck('id')->toArray();
        $categoryIds = \App\Models\Category::pluck('id')->toArray();
        foreach (range(1, 20) as $index) {
            $article = \App\Models\Article::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph($nbSentences = 3),
                'body' => $faker->paragraph(20),
                'image' => $faker->randomElement($array = array (
                    '/images/1.png',
                    '/images/2.png',
                    '/images/3.png'
                    )),
                'click' => $faker->numberBetween(100, 9000),
                'slug' => $faker->unique()->slug,
                'category_id' => $faker->randomElement($categoryIds),
                'type' => $faker->numberBetween(1,2),
                'user_id' => $faker->randomElement($userIds),
                'original' => $faker->optional(0.5)->url,
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
                'deleted_at' => $faker->optional(0.1)->dateTimeThisYear(),
            ]);
            $tags = $faker->randomElements($tagIds, 3);
            $article->tags()->sync($tags);
        }
    }
}
