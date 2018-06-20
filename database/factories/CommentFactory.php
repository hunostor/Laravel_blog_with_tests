<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 3:53 PM
 */



use Faker\Generator as Faker;
use App\Persistence\Model\Comment;

$factory->define(Comment::class, function(Faker $faker) {
    return [
        "comment" => $faker->text(),
        "is_reply_to" => 0,
        "enabled" => $faker->boolean(),
        "date" => $faker->dateTime,
    ];
});