<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('body', 300);
            $table->bigInteger('message_id')->unsigned(); 
            $table->foreign('message_id')
                  ->references('id')->on('messages')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned(); 
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replieds');
    }
}
