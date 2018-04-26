<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_idf')->unsigned()->index()->nullable();
            $table->foreign('user_idf')->references('id')->on('users')->onDelete('cascade');
            $table->integer('apply_idf')->unsigned()->index()->nullable();
            $table->foreign('apply_idf')->references('id')->on('job_applies')->onDelete('cascade');
            $table->string('f_file')->nullable();
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
        Schema::dropIfExists('free_files');
    }
}
