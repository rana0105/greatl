<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_idr')->unsigned()->index()->nullable();
            $table->foreign('user_idr')->references('id')->on('users');
            $table->integer('job_idr')->unsigned()->index()->nullable();
            $table->foreign('job_idr')->references('id')->on('job_posts');
            $table->string('rating')->nullable()->default(0);
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
        Schema::dropIfExists('client_ratings');
    }
}
