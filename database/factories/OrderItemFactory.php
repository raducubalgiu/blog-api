<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /** @var Product $product */
        $product = Product::inRandomOrder()->first();

        return [
            'product_title' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
