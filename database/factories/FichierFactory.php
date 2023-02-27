<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudient;

class FichierFactory extends Factory
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
            'path'        => '/public/fichier/a.zip',
            'etudientsId' => Etudient::factory()
        ];
    }
}
