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
        //$this->call(UsersTableSeeder::class);
       // $this->call(LaratrustSeeder::class);
       factory(App\State::class, 10)->create();
       factory(App\District::class, 50)->create();
        factory(App\Party::class, 50)->create();
        factory(App\Candidate::class, 50)->create();
        factory(App\User::class, 50)->create();
    }
}
