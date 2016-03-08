<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = ['nome', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep', 'observacoes', 'ddd1', 'telefone1', 'ddd2', 'telefone2', 'ddd3', 'telefone3', 'status'];

    protected $table = 'fornecedores';
}
