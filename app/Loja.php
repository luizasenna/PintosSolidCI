<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    protected $fillable = ['id', 'descricao', 'status'];

    public function setores() {
        return $this->hasMany('App\Setor', 'idloja');
    }
}
