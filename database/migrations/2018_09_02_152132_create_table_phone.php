<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhone extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phone', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('id_contact')->unsigned();
			$table->foreign('id_contact')->references('id')->on('contact')->onDelete('cascade');
			$table->string('area');
			$table->string('number');
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
		Schema::dropIfExists('phone');
	}
}
