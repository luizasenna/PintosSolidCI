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
    ];

    protected $table = 'equipamentos';
    protected $dates = ['created_at', 'updated_at', 'datacompra'];
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

    public function orcador() {
        return $this->belongsTo('App\User', 'idorcador');
    }

    public function aprovador() {
        return $this->belongsTo('App\User', 'idaprovador');
    }

    public function cadastro() {
        return $this->belongsTo('App\User', 'idcadastro');
    }
}
