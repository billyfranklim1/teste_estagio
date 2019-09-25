<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
  protected $table = 'turmas';
  protected $fillable = ['nomeTurma','periodo','ch','fk_idInst'];
  protected $guarded = ['id', 'created_at', 'update_at'];
}
