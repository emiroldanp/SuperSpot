<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LikesDislikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('likes_dislikes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean("likedislike");
            $table->integer("comment_id")->references('id')->on('comments');
            $table->foreignId('user_id')->references('id')->on('users');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
