<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'short_link' => $this->faker->bothify("**********"),
//            пробовал делать long_link через faker но не все урлы проходят валидацию надо подумать как ее сделать
            'long_link' => "https://www.youtube.com",
            'title' => $this->faker->name,
        ];
    }
}
