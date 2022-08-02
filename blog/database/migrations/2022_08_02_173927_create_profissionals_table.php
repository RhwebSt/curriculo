<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('psempresa',70)->nullable();
            $table->string('pscargo',40)->nullable();
            $table->string('psexperiencia',255)->nullable();
            $table->string('psdatainicio',10)->nullable();
            $table->string('psdatafinal',10)->nullable();
            $table->unsignedInteger('academico_id')->unsigned()->nullable();
            $table->foreign('academico_id')->references('id')->on('academicos')->onDelete('cascade');
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
        Schema::dropIfExists('profissionals');
    }
}
