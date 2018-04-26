<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_post_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('payment')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('token', 1000)->nullable();
            $table->string('PayerID', 1000)->nullable();
            $table->string('merchant_id', 1000)->nullable();
            $table->string('merchant_email', 1000)->nullable();
            $table->string('currency')->nullable();
            $table->timestamp('payment_create');
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
        Schema::dropIfExists('project_payments');
    }
}
