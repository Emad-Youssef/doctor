<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePocketLimitsTable extends Migration {

	public function up()
	{
		Schema::create('pocket_Limits', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('limit')->default('50');
		});
	}

	public function down()
	{
		Schema::drop('pocket_Limits');
	}
}