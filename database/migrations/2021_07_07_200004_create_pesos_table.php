<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventories_id')->references('id')->on('inventories');
            $table->double('peso');
            $table->double('valor');
            $table->string('NombrePesador');
            $table->string('fechaPeso');
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
        Schema::dropIfExists('pesos');
    }
}
