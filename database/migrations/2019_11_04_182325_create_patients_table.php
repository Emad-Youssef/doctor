<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
            $table->integer('pocket_id')->unsigned();
            $table->string('patient_name', 191);
			$table->string('address', 191)->index();
			$table->string('age', 191);
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}
