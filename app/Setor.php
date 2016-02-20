<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable = ['nome', 'status', 'idloja'];
    protected $table = 'setores';

    public function loja() {
        return $this->belongsTo('App\Loja', 'idloja');
    }
}
