<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook')->default('http://facebook.com');
            $table->string('twitter')->default('http://twitter.com');
            $table->string('youtube')->default('http://youtube.com');
            $table->string('linkend')->default('http://linkend.com');
            $table->string('google_plus')->default('http://google-plus.com');
            $table->string('instragram')->default('http://instragram.com');
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
        Schema::dropIfExists('social_links');
    }
}
