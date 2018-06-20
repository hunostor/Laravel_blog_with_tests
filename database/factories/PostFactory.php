<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 6/12/18
 * Time: 3:48 PM
 */


use App\Persistence\Model\Post;
use Faker\Generator as Faker;


$factory->define(Post::class, function(Faker $faker) {
    return [
        "title" => $faker->title,
        "article" => $faker->text(),
        "title_clean" => $faker->unique()->slug(),
        "date_published" => $faker->dateTime,
        "banner_image" => $faker->imageUrl(),
        "featured" => $faker->boolean(),
        "enabled" => $faker->boolean(),
        "comments_enabled" => $faker->boolean(),
        "views" => $faker->numberBetween(),
    ];
});