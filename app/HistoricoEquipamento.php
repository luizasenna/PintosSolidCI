<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoEquipamento extends Model
{
    protected $table = 'historicoequipamento';
    protected $fillable = ['observacao', 'idequipamento', 'idsetor', 'idusuario', 'idtipohistorico'];

    public function equipamento() {
        return $this->belongsTo('App\Equipamento', 'idequipamento');
    }

    public function tipo() {
        return $this->belongsTo('App\TipoHistorico', 'idtipohistorico');
    }

    public function setor() {
        return $this->belongsTo('App\Setor', 'idsetor');
    }

     public function usuario() {
        return $this->belongsTo('App\User', 'idusuario');
    }
}
