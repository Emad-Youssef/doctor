<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactUsTable extends Migration {

	public function up()
	{
		Schema::create('contact_us', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 191);
			$table->string('email', 191);
            $table->string('subject', 191);
            $table->text('message');
            $table->integer('readable')->default(0);
		});
	}

	public function down()
	{
		Schema::drop('contact_us');
	}
}
