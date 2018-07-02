<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'brianrakoi',
        'email' => 'brianrakoi@gmail.com',
        'password' => $password ?: $password = bcrypt('fsociety'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    

    return [
        'title' => $faker->paragraph(1),
        'category_id'=>rand(1,6),
        'slug' => $faker->name,
        'body' => $faker->paragraph(7),

     
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    

    return [
        
        'name' => $faker->name,

     
    ];
});