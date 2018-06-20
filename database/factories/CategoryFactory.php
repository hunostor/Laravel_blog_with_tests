<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 3:54 PM
 */

use Faker\Generator as Faker;

$factory->define(\App\Persistence\Model\Category::class, function(Faker $faker) {
    return [
        "name" => $faker->text(45),
        "name_clean" => $faker->unique()->text(45),
        "enabled" => $faker->boolean(),
        "created_at" => $faker->dateTime
    ];
});