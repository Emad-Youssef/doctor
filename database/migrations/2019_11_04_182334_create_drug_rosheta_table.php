<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDrugRoshetaTable extends Migration {

	public function up()
	{
		Schema::create('drug_rosheta', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('rosheta_id')->unsigned();
			$table->integer('drug_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('drug_rosheta');
	}
}