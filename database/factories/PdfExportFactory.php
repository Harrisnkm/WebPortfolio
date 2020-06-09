<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PdfExport;
use Faker\Generator as Faker;

$factory->define(PdfExport::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName
    ];
});
