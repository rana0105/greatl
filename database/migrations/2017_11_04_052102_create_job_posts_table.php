<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('p_title')->nullable();
            $table->integer('p_category_id')->unsigned()->index()->nullable();
            $table->foreign('p_category_id')->references('id')->on('project_categories');
            $table->string('p_description')->nullable();
            $table->integer('p_joblevel_id')->unsigned()->index()->nullable();
            $table->foreign('p_joblevel_id')->references('id')->on('job_levels');
            $table->string('p_jobskill')->nullable();
            $table->string('p_sdate')->nullable();
            $table->string('p_edate')->nullable();
            $table->string('p_less')->nullable();
            $table->integer('p_ratetype_id')->unsigned()->index()->nullable();
            $table->foreign('p_ratetype_id')->references('id')->on('project_types');
            $table->string('p_buddget')->nullable();
            $table->string('p_file')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('job_posts');
    }
}
