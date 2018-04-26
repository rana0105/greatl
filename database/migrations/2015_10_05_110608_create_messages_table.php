<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function ($tbl) {
            $tbl->increments('id');
            $tbl->text('message')->nullable();
            $tbl->boolean('is_seen')->default(0)->nullable();
            $tbl->boolean('deleted_from_sender')->default(0)->nullable();
            $tbl->boolean('deleted_from_receiver')->default(0)->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $tbl->integer('conversation_id')->nullable();
            $tbl->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
