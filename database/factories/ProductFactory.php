<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=4, $asText = true);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'price' => $this->faker->numberBetween(100, 500),
            'image' => 'digital_'.str_pad($this->faker->unique()->numberBetween(1, 22), 2, 0, STR_PAD_LEFT).'.jpg',
            'status' => 'insale',
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'quantity' => $this->faker->numberBetween(100, 200),
            'category_id' => $this->faker->numberBetween(1, 8)
        ];
    }
}
