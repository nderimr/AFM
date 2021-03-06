<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $this->call(UsersTableSeeder::class);
         $this->call(TagsTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
        // factory(App\User::class,5)->create();
         
         $this->call(FilesTableSeeder::class);
        $this->call(CommentsTableSeeder::class); 
    }
}
