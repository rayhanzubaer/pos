<?php

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
        factory(App\Category::class, 200)->create();
//        factory(App\User::class, 1)->create();
//         $this->call(UserSeeder::class);
    }
}
