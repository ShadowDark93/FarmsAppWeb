<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->foreignId('farms_id')->references('id')->on('farms');
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('InternalCode')->nullable();
            $table->string('Category')->nullable();
            $table->char('Sex');
            $table->char('Third')->default('0');
            $table->string('ThirdName')->nullable();
            $table->timestamps();
            $table->char('state')->default('1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
