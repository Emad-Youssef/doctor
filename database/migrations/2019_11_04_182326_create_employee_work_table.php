<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeWorkTable extends Migration {

	public function up()
	{
		Schema::create('employee_work', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('employee_id')->unsigned();
			$table->integer('work_id')->unsigned();
			$table->string('from', 191);
			$table->string('to', 191);
		});
	}

	public function down()
	{
		Schema::drop('employee_work');
	}
}
