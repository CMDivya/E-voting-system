
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'dob'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'adhaar_no' => $faker->unique()->phoneNumber,
        'gender'=>collect(['male','female'])->random(),
        'contact_no' => $faker->unique()->phoneNumber,
        'party_id'=>App\Party::all()->random()->id,
        'address' => $faker->address,
        'state_id' => App\State::all()->random()->id,
        'district_id'=>App\District::all()->random()->id,
        'email_verified_at' => now(),
        

    ];
});