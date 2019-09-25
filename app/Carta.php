<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $table = 'cartas';
    protected $fillable = ['frenteCarta','costaCarta','nivel','fk_idBaralho'];
    protected $guarded = ['idCarta', 'created_at', 'update_at'];
    protected $primaryKey = 'idCarta';

}
