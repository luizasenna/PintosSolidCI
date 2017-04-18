<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHistorico extends Model
{
    protected $table = 'tipohistorico';
    protected $fillable = ['descricao'];
}
