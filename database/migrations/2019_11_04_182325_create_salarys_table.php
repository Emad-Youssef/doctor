<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalarysTable extends Migration {

	public function up()
	{
		Schema::create('salarys', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
            $table->integer('employee_id')->unsigned();
            $table->string('salary');

		});
	}

	public function down()
	{
		Schema::drop('salarys');
	}
}
