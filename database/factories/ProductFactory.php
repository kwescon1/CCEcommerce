<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {

        $catIds = Category::select('id')->get()->toArray();

        $cat = $catIds[array_rand($catIds)];


        $image = '';

        switch ($cat['id']) {
            case '1':
                $images = ['man_1.jpeg', 'man_2.jpeg', 'man_3.jpeg', 'man_4.jpeg', 'man_5.jpeg', 'man_6.jpeg', 'man_7.jpeg'];

                $image = $images[array_rand($images)];

                break;

            case '2':
                $images = ['woman_1.jpeg', 'woman_2.jpeg', 'woman_3.jpeg', 'woman_4.jpeg', 'woman_5.jpeg', 'woman_6.jpeg', 'woman_7.jpeg'];

                $image = $images[array_rand($images)];

                break;

            case '3':
                $images = ['shoe_1.jpeg', 'shoe_2.jpeg', 'shoe_3.jpeg', 'shoe_4.jpeg', 'shoe_5.jpeg', 'shoe_6.jpeg', 'shoe_7.jpeg', 'shoe_8.jpeg'];

                $image = $images[array_rand($images)];

                break;

            default:
                $images = ['electronic_1.jpeg', 'electronic_2.jpeg', 'electronic_3.jpeg', 'electronic_4.jpeg', 'electronic_5.jpeg', 'electronic_6.jpeg', 'electronic_7.jpeg', 'electronic_8.jpeg', 'electronic_9.jpeg'];

                $image = $images[array_rand($images)];

                break;
        }

        $quantity = rand(0, 100);

        $status = '';

        $quantity < 1 ? $status = 'out of stock' : $status = 'in stock';
        $name = (string)$this->faker->word();


        return [
            //
            'name' => $name,
            'category_id' => $cat['id'],
            'quantity' => $quantity,
            'status' => $status,
            'slug' => Str::lower(Str::slug($name)),
            'image' => $image,
            'description' => $this->faker->paragraphs(5, true)

        ];
    }
}
