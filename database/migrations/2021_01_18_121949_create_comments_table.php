<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('comment');
          
            $table->integer('blog_id')->unsigned();
            $table->timestamps();
        });



        Schema::table('comments', function ($table) {
            $table->foreign('blog_id')->references('id')->on('blogs')-onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['blog_id']);
        Schema::drop('comments');
        
    }
}