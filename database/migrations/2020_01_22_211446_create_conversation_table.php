<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->bigIncrements('conversation_id');

             // Usuario
            $table->bigInteger('user_id')->unsigned();   
            $table->foreign('user_id')->references('id')->on('users');

            // Contacto
            $table->bigInteger('contact_id')->unsigned();   
            $table->foreign('contact_id')->references('id')->on('users');

            $table->text('last_message')->nullable();
            $table->dateTime('last_message_time')->nullable();

            $table->boolean('listen_notifications')->default(true);
            $table->boolean('blocked')->default(false);
            
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
        Schema::dropIfExists('conversation');
    }
}
