<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
		'vacancy_name' => $faker->lastName(),
        'number_of_workers' => $faker->randomDigit(1000),
        'organization_id' => $faker->numberBetween(1, 50),  
        'salary' => $faker->randomDigit(100000),
    ];
});
