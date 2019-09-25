<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAlunos extends Migration
{

    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeAluno',100);
            $table->string('cpf',20);
            $table->string('email',100);
            $table->string('telefone',20);
            $table->date('data_nascimento');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
