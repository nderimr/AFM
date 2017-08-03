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

/** @var \Illuminate\Database\Eloquent\Factory $factory 
*/
$factory->define(App\User::class, 
	function (Faker\Generator $faker) 
	{
     static $password;

      return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'surname'=>$faker->name,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
    }
);

$factory->define(App\Article::class, 
    function (Faker\Generator $faker) 
    {
     
      return [
        'title' => $faker->sentence($nbWords = 5),
        'content' => $faker->sentence($nbWords = 250),
        'type'=>str_random(5),
        'workflowName' => str_random(20),
        'state' => str_random(5),
    ];
    }
);