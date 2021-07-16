<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TodasTabelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('uf');
            $table->string('nome');
            $table->string('documento')->unique();
        });

        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa')->constrained('empresas');
            $table->string('nome_fornecedor');
            $table->string('documento_fornecedor')->unique();
            $table->datetime('data_cadastro');
            $table->string('telefone');
            $table->string('rg')->nullable();
            $table->date('data_nascimento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
        Schema::dropIfExists('fornecedores');
    }
}
