<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_post_id')->unsigned()->index()->nullable();
            $table->foreign('job_post_id')->references('id')->on('job_posts');
            $table->integer('freelancer_id')->nullable();
            $table->string('bidamount')->nullable();
            $table->string('getpaid')->nullable();
            $table->string('taketime')->nullable();
            $table->string('coverletter')->nullable();
            $table->string('milestone')->nullable();
            $table->string('mile_des')->nullable();
            $table->string('a_file')->nullable();
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
        Schema::dropIfExists('job_applies');
    }
}
