<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
  protected $table = 'matriculas';
  protected $fillable = ['fk_idTurma','fk_idAluno'];
  protected $guarded = ['id', 'created_at', 'update_at'];
}
