<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'dob'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'adhaar_no' => $faker->unique()->phoneNumber(),
        'gender'=>collect(['male','female'])->random(),
        'contact_no' => $faker->unique()->phoneNumber,
        'address' =>$faker->address,
        'state_id' => App\State::all()->random()->id,
        'district_id'=>App\District::all()->random()->id,
        'type'=>collect(['Admin','Voter'])->random(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
