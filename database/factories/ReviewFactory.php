<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id = User::inRandomOrder()->first();
        $product_id = Product::inRandomOrder()->first();

        return [
            'stars' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->text(100),
            'product_id' => $product_id,
            'user_id' => $user_id
        ];
    }
}
