<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('salarys', function(Blueprint $table) {
			$table->foreign('employee_id')->references('id')->on('employees')
						->onDelete('cascade')
						->onUpdate('cascade');
        });

        Schema::table('employee_work', function(Blueprint $table) {
			$table->foreign('employee_id')->references('id')->on('employees')
						->onDelete('cascade')
						->onUpdate('cascade');
        });

		Schema::table('employee_work', function(Blueprint $table) {
			$table->foreign('work_id')->references('id')->on('works')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('patients', function(Blueprint $table) {
			$table->foreign('pocket_id')->references('id')->on('pockets')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('roshetas', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('cascade')
						->onUpdate('cascade');
        });
        Schema::table('drug_rosheta', function(Blueprint $table) {
			$table->foreign('rosheta_id')->references('id')->on('roshetas')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('drug_rosheta', function(Blueprint $table) {
			$table->foreign('drug_id')->references('id')->on('drugs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('salarys', function(Blueprint $table) {
			$table->dropForeign('salarys_employee_id_foreign');
        });
        Schema::table('employee_work', function(Blueprint $table) {
			$table->dropForeign('employee_work_employee_id_foreign');
		});
		Schema::table('employee_work', function(Blueprint $table) {
			$table->dropForeign('employee_work_work_id_foreign');
        });

		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_pocket_id_foreign');
		});
		Schema::table('roshetas', function(Blueprint $table) {
			$table->dropForeign('roshetas_patient_id_foreign');
        });
        Schema::table('drug_rosheta', function(Blueprint $table) {
			$table->dropForeign('drug_rosheta_rosheta_id_foreign');
		});
		Schema::table('drug_rosheta', function(Blueprint $table) {
			$table->dropForeign('drug_rosheta_drug_id_foreign');
		});
	}
}
