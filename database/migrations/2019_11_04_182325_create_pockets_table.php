<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePocketsTable extends Migration {

	public function up()
	{
		Schema::create('pockets', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('f_name', 191);
			$table->string('l_name', 191);
			$table->string('country', 191)->index();
			$table->string('city', 191);
			$table->enum('sex', array('male', 'female'));
			$table->string('phone', 191);
			$table->string('age', 191);
            $table->enum('patient', array('no', 'yes'))->default('no');
            $table->enum('confirm', array('no', 'yes'))->default('no');
			$table->string('y', 191);
			$table->string('m', 191);
			$table->string('d', 191);
		});
	}

	public function down()
	{
		Schema::drop('pockets');
	}
}
