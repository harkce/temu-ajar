<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subject');
            $table->longText('additional')->nullable();
            $table->dateTime('time');
            $table->longText('location');
            $table->integer('student');
            $table->integer('state')->default(0);
            $table->integer('budget_range')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('budget_range')->references('id')->on('budgets');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}
