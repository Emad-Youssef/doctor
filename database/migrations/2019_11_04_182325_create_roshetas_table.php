<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoshetasTable extends Migration {

	public function up()
	{
		Schema::create('roshetas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('diagnosis');
            $table->integer('patient_id')->unsigned();
			$table->string('doctor_name', 191);
		});
	}

	public function down()
	{
		Schema::drop('roshetas');
	}
}
