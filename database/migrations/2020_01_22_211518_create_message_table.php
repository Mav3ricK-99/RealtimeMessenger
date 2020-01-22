<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('message_id');

            // Usuario
            $table->bigInteger('from')->unsigned();   
            $table->foreign('from')->references('id')->on('users');

            // Contacto
            $table->bigInteger('to')->unsigned();
            $table->foreign('to')->references('id')->on('users');

            $table->text('message');

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
        Schema::dropIfExists('message');
    }
}
