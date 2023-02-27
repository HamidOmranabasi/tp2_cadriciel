<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudient; 

class ForumPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre'       => $this->faker->text(10),
            'titre_fr'    => $this->faker->text(10),
            'contenu'     => $this->faker->text(100),
            'contenu_fr'  => $this->faker->text(100),
            'date'        => $this->faker->date(),
            'etudientsId' => Etudient::factory()
        ];
    }
}
