<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaInstrutores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrutores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeInst',100);
            $table->string('emailInst',100);
            $table->float('valor_hora');
            $table->string('certificados',200);
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
        Schema::dropIfExists('instrutores');
    }
}
