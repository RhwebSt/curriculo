<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aslocal',70)->nullable();
            $table->string('ascurso',70)->nullable();
            $table->string('asdatainicio',10)->nullable();
            $table->string('asdataconclusao',10)->nullable();
            $table->unsignedInteger('pessoal_id')->unsigned()->nullable();
            $table->foreign('pessoal_id')->references('id')->on('pessoals')->onDelete('cascade');
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
        Schema::dropIfExists('academicos');
    }
}
