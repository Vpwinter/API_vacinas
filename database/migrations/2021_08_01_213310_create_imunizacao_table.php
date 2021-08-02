<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImunizacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imunizacao', function (Blueprint $table) {
            $table->id();
            $table->string('id_paciente');
            $table->string('lote');
            $table->string('fabricante');
            $table->string('dose_aplicada');
            $table->string('status');
            $table->string('data_aplicacao');
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
        Schema::dropIfExists('imunizacao');
    }
}
