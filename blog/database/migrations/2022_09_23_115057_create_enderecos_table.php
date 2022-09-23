<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('escep', 16)->nullable();
            $table->char('eslogradouro', 150)->nullable();
            $table->char('esbairro', 150)->nullable();
            $table->char('esestado', 20)->nullable();
            $table->char('esmunicipio', 30)->nullable();
            $table->integer('escodmunic')->nullable();
            $table->char('esuf', 2)->nullable();
            $table->char('escomplemento', 50)->nullable();
            $table->char('esnum', 10)->nullable();
            $table->integer('pessoals_id')->unsigned()->nullable();
            $table->foreign('pessoals_id')->references('id')->on('pessoals')->onDelete('cascade');
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
        Schema::dropIfExists('enderecos');
    }
}
