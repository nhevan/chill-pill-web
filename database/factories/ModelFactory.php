<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'user_type_id' => function(){
            return factory('App\UserType')->create()->id;
        }
    ];
});

$factory->define(App\UserType::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->name,
        'description' => $faker->sentence(2)
    ];
});

$factory->define(App\PatientMetadata::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'emergency_contact_email' => $faker->email,
        'box_serial' => "CP".$faker->numberBetween($min = 1000, $max = 9000)
    ];
});

$factory->define(App\PatientCondition::class, function (Faker\Generator $faker) {
    return [
        'patient_id' => function(){
            return factory('App\PatientMetadata')->create()->id;
        },
        'condition' => $faker->sentence(5)
    ];
});
