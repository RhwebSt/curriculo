<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vsempresa',70)->nullable();
            $table->char('vstitulo', 70)->nullable();
            $table->integer('viquantidade')->nullable();
            $table->string('vsdescricao',255)->nullable();
            $table->string('vsdatafinal',10)->nullable();
            $table->string('vscidade',20)->nullable();
            $table->string('vsuf',2)->nullable();
            $table->float('vivalor',8,2)->nullable(); 
            $table->string('vstipo',20)->nullable();
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
        Schema::dropIfExists('vagas');
    }
}
