<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     * @var string
    * */
    protected $model = Post::class;

/**
 * Define the model's default state.
 * @return array
 * */
    
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,7)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(function($p){
                return "<p>$p</p><br>";
            })->implode(''),
            'lokasi' => collect($this->faker->paragraphs(mt_rand(5,10)))->map(function($p){
                return "<p>$p</p><br>";
            })->implode(''),
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,4),
            'region_id' => mt_rand(1,39),
            'status_id' => mt_rand(1,4),
            'komentar' => $this->faker->sentence(mt_rand(2,7)),

        ];
    }
}
