<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();
=======
        $this->call([
            UsersTableSeeder::class,
        ]);
>>>>>>> 20d2e20 (Fix Login issue)
    }
}
