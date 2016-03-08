<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\MainController;

class FornecedorController extends MainController
{
    const fornecedor_estados = [
        'Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal',
        'Espírito Santo', 'Goiás', 'Maranhão', 'Mato Grosso', 'Mato Grosso do Sul',
        'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro',
        'Rio Grande do Norte', 'Rio Grando do Sul', 'Rondônia', 'Roraima', 'Santa Catarina',
        'São Paulo', 'Sergipe', 'Tocantins'
    ];

    public function index()
    {
        $filter = Request::exists('filter') ? Request::input('filter') : '';

        $entities = Fornecedor::where('nome', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->paginate(15);

		return view('admin.fornecedor.index', [
            'entities' => $entities,
            'filter' => $filter,
            'entity_status' => self::entity_status
        ]);
    }

    public function create()
    {
        return view('admin.fornecedor.insere', [
            'entity_status' => self::entity_status,
            'fornecedor_estados' => self::fornecedor_estados
        ]);
    }

    public function add() {
        $fornecedor = Fornecedor::create(Request::all());

        return redirect()->action('FornecedorController@index')->with('status', 'Fornecedor adicionado com sucesso');
    }

    public function show($id)
    {
        return view('admin.fornecedor.mostra', [
            'entity' => Fornecedor::findOrFail($id),
            'entity_status' => self::entity_status
        ]);
    }

    public function edit($id)
    {
        return view('admin.fornecedor.edita', [
            'entity' => Fornecedor::findOrFail($id),
            'entity_status' => self::entity_status,
            'fornecedor_estados' => self::fornecedor_estados
        ]);
    }

    public function update()
    {
        $fornecedor = Fornecedor::findOrFail(Request::input('id'));
        $fornecedor->fill(Request::all());
        $fornecedor->save();

        return redirect()->action('FornecedorController@index')->with('status', 'Fornecedor atualizado com sucesso');
    }

    public function delete($id)
    {
        Fornecedor::findOrFail($id)->delete();

        return redirect()->action('FornecedorController@index')->with('status', 'Fornecedor removido com sucesso');
    }
}
