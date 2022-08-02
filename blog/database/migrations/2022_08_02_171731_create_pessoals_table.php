<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pstitulopro',70)->nullable();
            $table->char('psnascimento', 10)->nullable();
            $table->string('pstelefone',15)->nullable();
            $table->string('pssobrevoce',255)->nullable();
            $table->string('psfoto',255)->nullable();
            $table->unsignedInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pessoals');
    }
}
