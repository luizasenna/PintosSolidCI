<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['id, idcategoria,nome, status, obs '];

    protected $table = 'grupoequipamento';

    public function categoria() {
      return $this->belongsTo('App\Categoria', 'idcategoria');
     }
}
