<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fact_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();

            $table->unique(['fact_id','locale']);
            $table->foreign('fact_id')->references('id')->on('facts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fact_translations');
    }
}
