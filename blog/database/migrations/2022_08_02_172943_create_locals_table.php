<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('islocal',70)->nullable();
            $table->string('isidioma',70)->nullable();
            $table->string('isnivel',20)->nullable();
            $table->string('isdatainicio',10)->nullable();
            $table->string('isdatafinal',10)->nullable();
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
        Schema::dropIfExists('locals');
    }
}
