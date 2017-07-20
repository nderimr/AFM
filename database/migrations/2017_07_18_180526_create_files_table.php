<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Files(id, path,type,size,description, article_id) 
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path',300);
            $table->string('type');
            $table->integer('size');
            $table->text('description');
            $table->integer('article_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
