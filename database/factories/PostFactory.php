<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),//format sentence digunakan untuk membuat data paragraf 
            //mt_rand berfungsi untuk memngambil data acak
            //2,8 merupakan minnimal maksimal data acak, yaitu minimal 2 data, dan maksimal 8 data
            'slug' =>$this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),

            /* 'body' => '<p>' . implode('<p></p>',$this->faker->paragraphs(mt_rand(5, 10))) . '</p>', */

            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                    ->map(fn($p) => "<p>$p</p>")
                    ->implode(''),
                 //setiap paragraf dibungkus mengguanakan tag p 

            //implode untuk menjoinkan tag p 
            'user_id' =>mt_rand(1,3), //mengambil user random dari 3 user palsu
            'category_id' =>mt_rand(1, 2) //mengambil category random dari 2 kategori palsu
        ];
    }
}
