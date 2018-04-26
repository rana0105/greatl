<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_freelancers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_idu')->unsigned()->index()->nullable();
            $table->foreign('user_idu')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('role_idu')->nullable();
            $table->string('p_image')->nullable();
            $table->string('timezone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('location')->nullable()->default(0);
            $table->string('phone')->nullable();
            $table->string('level')->nullable();
            $table->string('category')->nullable();
            $table->integer('category')->unsigned()->index()->nullable();
            $table->foreign('category')->references('id')->on('project_categories');
            $table->string('social_link')->nullable();
            $table->string('designation')->nullable();
            $table->string('skill')->nullable();
            $table->string('overview')->nullable();
            $table->string('hourly_rate')->nullable();
            $table->string('experience')->nullable();
            $table->string('availability')->nullable();
            $table->string('current_plan')->nullable();
            $table->string('language')->nullable();
            $table->string('proficiency')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('client_freelancers');
    }
}
