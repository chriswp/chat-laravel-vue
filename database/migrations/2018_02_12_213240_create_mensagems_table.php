<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMensagemsTable.
 */
class CreateMensagemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mensagens', function(Blueprint $table) {
            $table->increments('id');
            $table->string('mensagem');

            $table->integer('chat_id')->unsigned();
            $table->foreign('chat_id')->references('id')->on('chats');


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
		Schema::drop('mensagens');
	}
}
