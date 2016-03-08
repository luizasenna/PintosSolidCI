<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setor;
use App\Loja;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\MainController;

class SetorController extends MainController
{
    public function index()
    {
        $filter = Request::exists('filter') ? Request::input('filter') : '';

        $entities = Setor::where('nome', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->paginate(15);

		return view('admin.setor.index', [
            'entities' => $entities,
            'filter' => $filter,
            'entity_status' => self::entity_status
        ]);
    }

    public function create()
    {
        $lojas = Loja::all();
        return view('admin.setor.insere', [
            'lojas' => $lojas,
            'entity_status' => self::entity_status
        ]);
    }

    public function add()
	{
        $setor = Setor::create(Request::all());

        return redirect()->action('SetorController@index')->with('status', 'Setor adicionado com sucesso');
	}

    public function show($id)
    {
        return view('admin.setor.mostra', [
            'entity' => Setor::findOrFail($id),
            'entity_status' => self::entity_status
        ]);
    }

    public function edit($id)
    {
        $lojas = Loja::all();
        return view('admin.setor.edita', [
            'entity' => Setor::findOrFail($id),
            'lojas' => $lojas,
            'entity_status' => self::entity_status
        ]);
    }

    public function update()
    {
        $setor = Setor::findOrFail(Request::input('id'));
        $setor->fill(Request::all());
        $setor->save();

        return redirect()->action('SetorController@index')->with('status', 'Setor atualizado com sucesso');
    }

    public function delete($id)
    {
        Setor::findOrFail($id)->delete();

        return redirect()->action('SetorController@index')->with('status', 'Setor removido com sucesso');
    }
}
