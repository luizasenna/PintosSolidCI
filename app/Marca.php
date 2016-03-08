<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['descricao', 'status', 'observacoes'];
    protected $table = 'marcas';
}
