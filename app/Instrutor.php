<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrutor extends Model
{
  protected $table = 'instrutores';
  protected $fillable = ['nomeInst','emailInst','valor_hora', 'certificados'];
  protected $guarded = ['id', 'created_at', 'update_at'];
}
