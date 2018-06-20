<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 3:54 PM
 */

use Faker\Generator as Faker;

$factory->define(\App\Persistence\Model\Tag::class, function(Faker $faker) {
    return [
        "tag" => $faker->text(45),
        "tag_clean" => $faker->unique()->text(45),
    ];
});