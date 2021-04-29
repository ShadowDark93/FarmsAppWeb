<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('AdminName')->nullable();
            $table->string('Name');
            $table->string('Location');
            $table->string('Phone')->nullable();
            $table->timestamps();
            $table->char('state')->default("1");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
}
