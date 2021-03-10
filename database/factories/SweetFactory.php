<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sweet;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
      'sweet_name' => $faker->name,
    ];
});
