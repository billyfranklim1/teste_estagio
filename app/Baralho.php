<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baralho extends Model
{
    protected $table = 'baralhos';
    protected $fillable = ['nomeBaralho','descricaoBaralho'];
    protected $guarded = ['idBaralho', 'created_at', 'update_at'];
    protected $primaryKey = 'idBaralho';
}
