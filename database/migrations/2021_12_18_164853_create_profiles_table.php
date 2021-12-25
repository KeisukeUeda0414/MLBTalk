<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nickname', 15);
            $table->string('introduction', 200)->nullable();
            $table->string('icon')->nullable();
            $table->bigInteger('user_id')->unsigned(); 
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->bigInteger('team_id')->unsigned()->nullable(); 
            $table->foreign('team_id')
                  ->references('id')->on('teams')
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
        Schema::dropIfExists('profiles');
    }
}
