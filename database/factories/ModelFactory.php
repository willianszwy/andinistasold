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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Mountain::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'elevation' => $faker->randomNumber(4),
        'prominence' => $faker->randomNumber(4),
        'coordinates' => $faker->latitude.', '.$faker->longitude,
        'isolation' => $faker->randomNumber(4),
        'avatar' => $faker->slug,
    ];
});

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->country,
        'code' => $faker->countryCode,
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'start_date' => $faker->date,
        'finish_date' => $faker->date,
        'style' => $faker->randomElement(['A', 'E']),
    ];
});

$factory->define(App\Climber::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nickname' => $faker->firstName,
        'birth' => $faker->date,
        'gender' => $faker->randomElement(['F', 'M']),
        'avatar' => $faker->slug,
        'facebook' => $faker->url,
        'blog' => $faker->url,
        'instagram' => $faker->url,
        'twitter' => $faker->url,
        'email' => $faker->url,
        'site' => $faker->url,
        'phone' => $faker->cellphoneNumber,
    ];
});

$factory->define(App\Range::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
    ];
});

$factory->define(App\Route::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'face' => $faker->randomElement(['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW']),
        'verified' => $faker->randomElement([0, 1]),
        'mountain_id' => function () {
            return factory(App\Mountain::class)->create()->id;
        }
    ];
});

$factory->define(App\Summit::class, function (Faker\Generator $faker) {
    return [
        'date_summit' => $faker->date,
        'photo' => $faker->slug,
        'verified' => $faker->randomElement([0, 1]),
        'mountain_id' => function () {
            return factory(App\Mountain::class)->create()->id;
        },
        'route_id' => function () {
            return factory(App\Route::class)->create()->id;
        }
    ];
});
