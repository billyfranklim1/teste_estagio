<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $fillable = ['nomeAluno','cpf','email', 'telefone','data_nascimento'];
    protected $guarded = ['id', 'created_at', 'update_at'];
}
