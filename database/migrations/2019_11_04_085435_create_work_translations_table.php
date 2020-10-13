<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_id')->unsigned();
            $table->string('day');
            $table->string('locale')->index();

            $table->unique(['work_id','locale']);
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_translations');
    }
}
