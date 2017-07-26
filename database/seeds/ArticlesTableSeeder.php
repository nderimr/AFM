<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 
    public function run()
    {
        $content='';
        for($i=0;$i<220;$i++)
            $content=$content.' '.str_random(7); 
        
        DB::table('articles')->insert([
            'title' => str_random(20),
            'content' => $content,
            'type' => str_random(20),
            'workflowName' => str_random(20),
            'state' => str_random(5),
        ]);
    }
}
