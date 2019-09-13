<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'company_id' => $faker->id,
        'title'  => $faker->sentence(4, true),
        'country' => $faker->country(),
        'city' => $faker->city(),                 
        'is_book' => $faker->boolean(),//virt ??

    ];
});
