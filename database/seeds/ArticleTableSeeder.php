<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $item) {
            DB::table('article')->insert([
                'title' => $faker->text(50),
                'slug' => $faker->slug(),
                'body' => $faker->paragraph(rand(5,20)),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
