<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(App\CompanyTin::class, function (Faker $faker) {
    return [
        "company_name" => generate_company_name(),
        "tin_number" => rand(10000000, 99999999),
        "unique_code" => Hash::make("secret")
    ];
});

/**
 * Randomly generate a company name
 *
 * @return string
 */
function generate_company_name(){
    $first_bank = [
        "Kevajo", "Colessium", "Titan", "Crystal", "ABC", "Dynamic"
    ];

    $second_bank = [
        "Park", "Palace", "Tower", "Fridge"
    ];

    return $first_bank[rand(0, count($first_bank) - 1)] . " " . $second_bank[rand(0, count($second_bank) - 1)] . " " . rand(1, 18);
}
