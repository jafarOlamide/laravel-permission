<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_ids = DB::table('users')->pluck('id');
        $category_ids = DB::table('categories')->pluck('id');
        $randomNumber = $this->faker->numberBetween(1, 3);

        return [
            'title' => $this->faker->words($randomNumber, true),
            'full_text' => $this->faker->text(),
            'user_id' => $this->faker->randomElement($user_ids),
            'category_id' => $this->faker->randomElement($category_ids),
        ];
    }
}
