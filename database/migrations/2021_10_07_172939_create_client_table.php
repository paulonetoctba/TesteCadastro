<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empresa');
            $table->string('nome', 255);
            $table->string('cpf_cnpj', 18);
            $table->string('rg', 10);
            $table->date('data_nascimento');
            $table->string('telefone', 50);
            $table->string('email', 150);
            $table->string('cep', 10);
            $table->string('endereco', 255);
            $table->string('numero', 5);
            $table->timestamps();
            $table->foreign('id_empresa')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
