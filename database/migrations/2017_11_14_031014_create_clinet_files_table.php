<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinetFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinet_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_idc')->unsigned()->index()->nullable();
            $table->foreign('user_idc')->references('id')->on('users');
            $table->integer('post_idc')->unsigned()->index()->nullable();
            $table->foreign('post_idc')->references('id')->on('job_posts');
            $table->string('c_file')->nullable();
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
        Schema::dropIfExists('clinet_files');
    }
}
