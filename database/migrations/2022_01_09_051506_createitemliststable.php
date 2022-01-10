<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createitemliststable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  //title, body, due date (optional), media/attachment, reminders (see below), and a complete/incomplete flag
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('attachment');
            $table->date('duedate')->nullable();
            $table->string('reminder');
            $table->integer('status');
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
        Schema::dropIfExists('items');
    }
}
