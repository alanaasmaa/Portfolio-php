<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        \App\Models\Category::create([
            'name' => $faker->word,
            'slug' => $faker->slug,
            'parent_id' => '0',
            'created_at' => $faker->dateTimeThisYear(),
            'updated_at' => $faker->dateTimeThisYear(),
        ]);

        foreach (range(1, 10) as $index) {
            $categoryIds = \App\Models\Category::whereParentId('0')->pluck('id')->toArray();

            \App\Models\Category::create([
                'name' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'parent_id' => $faker->optional(0.5, '0')->randomElement($categoryIds),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }
    }
}
