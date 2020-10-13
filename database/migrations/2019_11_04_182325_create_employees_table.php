<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->increments('id');
            $table->timestamps();
            $table->string('ssn')->unique();
			$table->string('f_name', 191);
			$table->string('l_name', 191);
			$table->string('phone', 191)->unique();
			$table->boolean('status')->default(0);
			$table->enum('level', array('doctor','recepion','nursing','cleanliness'));
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}
