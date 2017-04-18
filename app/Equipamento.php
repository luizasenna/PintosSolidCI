<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
        'id',
        'idcategoria',
        'idorcador',
        'idaprovador',
        'idcadastro',
        'idfornecedor',
        'descricao',
        'chaveserial',
        'idmarca',
        'idloja',
        'idsetor',
        'voltagem',
        'nota',
        'valorcompra',
        'modelo',
        'codigobarras',
        'observacoes',
        'status',
        'caracteristicas',
        'usuariolocal',
        'situacao', 
        'idgrupo'
    ];

    protected $table = 'equipamentos';
    protected $dates = ['created_at', 'updated_at', 'datacompra', 'garantia'];
    // protected $dateFormat = ''


    public function marca() {
        return $this->belongsTo('App\Marca', 'idmarca');
    }

    public function fornecedor() {
        return $this->belongsTo('App\Fornecedor', 'idfornecedor');
    }

    public function setor() {
        return $this->belongsTo('App\Setor', 'idsetor');
    }

    public function loja() {
        return $this->belongsTo('App\Loja', 'idloja');
    }

    public function orcador() {
        return $this->belongsTo('App\User', 'idorcador');
    }

    public function aprovador() {
        return $this->belongsTo('App\User', 'idaprovador');
    }

    public function cadastro() {
        return $this->belongsTo('App\User', 'idcadastro');
    }

    public function historico() {
        return $this->hasMany('App\HistoricoEquipamento', 'idequipamento');
    }

    public function categoria() {
        return $this->belongsTo('App\Categoria', 'idcategoria');
    }

    public function grupo() {
        return $this->belongsTo('App\Grupo', 'idgrupo');
    }


}
