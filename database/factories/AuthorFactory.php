<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 3:51 PM
 */

use Faker\Generator as Faker;
use App\Persistence\Model\Author;

$factory->define(Author::class, function(Faker $faker) {
    return [
        "display_name" => $faker->unique()->userName,
        "first_name" => $faker->firstName,
        "last_name" => $faker->lastName,
    ];
});