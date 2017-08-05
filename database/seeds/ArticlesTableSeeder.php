<?php

use Illuminate\Database\Seeder;
use App\Tag;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
//creating an article and for every article creating a user 
    public function run()
    {
      
      $article = factory(App\Article::class,10)->create()->each(function($article)
      {
          $article->users()->save(factory(App\User::class)->create());
           
           $tags=Tag::all()->pluck('id')->toArray(); //get all tags from database 
           $randomid=array_rand($tags,1);
           
           $tag=Tag::findOrFail($tags[$randomid]); //get a random tag
           $article->tags()->save($tag); //save the ariticle_id and tag_id in article_tag table
           
      });
      
    }
}

