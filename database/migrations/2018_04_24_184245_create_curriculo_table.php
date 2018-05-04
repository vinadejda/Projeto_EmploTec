<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculo', function (Blueprint $table) {
            $table->increments('cd_curriculo',6);
            $table->string('ds_objetivo_profissional',50);
            $table->decimal('vl_pretencao_salarial', 5,2);
            $table->string('ds_formacao',60);
            $table->string('ds_experiencia', 60);
            $table->string('ds_infomacao_complementar', 40);
            $table->string('ds_resumo', 100);
            $table->integer('fk_candidato');
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
        Schema::dropIfExists('curriculo');
    }
}
