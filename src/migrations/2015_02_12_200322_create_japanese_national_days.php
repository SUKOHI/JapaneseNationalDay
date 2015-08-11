<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJapaneseNationalDays extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('japanese_national_days', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->date('date')->unique();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('japanese_national_days');
	}

}
