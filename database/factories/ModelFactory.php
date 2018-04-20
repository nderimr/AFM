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
* Create a user with random data using Faker\Generator::class 
*/
use App\Article;
use App\User;

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
        'title' => $faker->sentence(5),
        'content' => $faker->sentence(250),
        'type'=>$faker->word,
        'workflowName' => $faker->word,
        'state' => $faker->word,

    ];
    }
);
//generates file and to every file ataches a random Article_id 
$factory->define(App\File::class, 
    function (Faker\Generator $faker) 
    {
     
       $articles=Article::all()->pluck('id')->toArray(); //select ID's from articles table
      return [
        'path' => $faker->word,
        'type' => $faker->word,
        'size'=> $faker->randomNumber(5,false),
        'description' => $faker->sentence(10),
         'article_id' =>$faker->randomElement($articles),
         /* function () { 
           return factory(App\Article::class)->create()->id;
        }*/
    ];
    }
);


$factory->define(App\Comment::class, 
    function (Faker\Generator $faker) 
    {
      $articles=Article::all()->pluck('id')->toArray(); //select ID's from articles table
      $users=User::all()->pluck('id')->toArray(); //select ID's from articles table
          return [
          'content' => $faker->sentence(20),
          'date_created' => $faker->date('Y-m-d','now'),
          'user_id'=>$faker->randomElement($users),
          'article_id'=>$faker->randomElement($articles),
      ];
    }
);


$factory->define(App\Tag::class, 
    function (Faker\Generator $faker) 
    {
     
      return [
        'name'=>$faker->word,
        ];
    }
);