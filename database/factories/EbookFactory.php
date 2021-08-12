<?php

namespace Database\Factories;

use App\Models\Ebook;
use Illuminate\Database\Eloquent\Factories\Factory;

class EbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ebook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'title_ebook' => $this->faker->text(rand(10, 30)),
            'description' => $this->faker->text(rand(10, 200)),
            'image' => '/dist/img/default.png',
            'hashtag' => '#hacker #pendidikan',
            'link_download' => 'https://bitly/ab' . $this->faker->numberBetween(1, 10000) . 'ba.com',
        ];
    }
}
