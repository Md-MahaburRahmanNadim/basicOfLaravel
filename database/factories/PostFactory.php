<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //  //here we need to give the datable column where we are going to add those value as a key:value payer
            // 'title'=>'MOdel Factories',
            // 'excerpt'=>'Excerpt of our first model factory',
            // 'body'=>'Content of body',
            // 'image_path'=>'Image path',
            // 'is_published'=>1,
            // 'min_to_read'=>2
            /**
             those are hard coded value we need to use facker to generate fack data
             */
            'title'=>$this->faker->sentence(),
            'excerpt'=>$this->faker->realText($maxNbChars=50),
            'body'=>$this->faker->text(),
            'image_path'=>$this->faker->imageUrl(640,480),
            'is_published'=>1,
            'min_to_read'=>$this->faker->numberBetween(1,10)
        
        /**
         the faker or fack data are ready to be excuted to excuted it we need the help of model and also seed this. To do that we have to tell the DatabaseSeeder so that this use this class
         */
        ];
    }
}
