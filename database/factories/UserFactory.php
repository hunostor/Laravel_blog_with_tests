<?php

use App\Persistence\Model\Comment;
use App\Persistence\Model\Post;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Persistence\Model\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Post::class, function(\Faker\Generator $faker) {
    return [
        "title" => $faker->title,
        "article" => $faker->text(),
        "title_clean" => $faker->unique()->title,
        "date_published" => $faker->dateTime,
        "banner_image" => $faker->imageUrl(),
        "featured" => $faker->boolean(),
        "enabled" => $faker->boolean(),
        "comments_enabled" => $faker->boolean(),
        "views" => $faker->numberBetween(),
    ];
});

$factory->define(Comment::class, function(\Faker\Generator $faker) {
    return [
        "comment" => $faker->text(),
        "is_reply_to" => 0,
        "enabled" => $faker->boolean(),
        "date" => $faker->dateTime,
    ];
});

$factory->define(Author::class, function(\Faker\Generator $faker) {
    return [
        "display_name" => $faker->unique()->userName,
        "first_name" => $faker->firstName,
        "last_name" => $faker->lastName,
    ];
});

$factory->define(\App\Persistence\Model\Category::class, function(\Faker\Generator $faker) {
    return [
        "name" => $faker->text(45),
        "name_clean" => $faker->unique()->text(45),
        "enabled" => $faker->boolean(),
        "created_at" => $faker->dateTime
    ];
});

$factory->define(\App\Persistence\Model\Tag::class, function(\Faker\Generator $faker) {
    return [
        "tag" => $faker->text(45),
        "tag_clean" => $faker->unique()->text(45),
    ];
});