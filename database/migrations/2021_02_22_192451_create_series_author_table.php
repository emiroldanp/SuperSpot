<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series_author', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("series_id")->references("id")->on("series");
            $table->foreignId("author_id")->references("id")->on("author");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series_author');
    }
}
