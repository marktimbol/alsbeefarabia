<?php

use Illuminate\Support\Facades\Hash;

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Batman',
        'email' => 'im@batman.com',
        'password' => Hash::make('@llforhisgl0ry'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->sentence(3),
        'slug'  => $faker->slug,
        'description'  => $faker->paragraph,
        'photo' => $faker->imageUrl(800, 600)
    ]; 
});


$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    return [
        'category_id'   => $faker->numberBetween(1,8), //  factory(App\Category::class)->create()->id,
        'name'      => $faker->sentence(3),
        'slug'      => $faker->slug,
        'price'     =>  $faker->randomNumber(2),
        'description'   => $faker->paragraph,
        'photo'     => $faker->imageUrl(800,600)
    ];
});


$factory->define(App\Slide::class, function(Faker\Generator $faker) {

    return [
        'order' => $faker->numberBetween(1,5),
        'link'  => '#'
    ];

});

