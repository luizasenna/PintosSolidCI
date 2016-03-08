<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Marca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\MainController;

class MarcaController extends MainController
{
    public function index()
    {
        $filter = Request::exists('filter') ? Request::input('filter') : '';

        $entities = Marca::where('descricao', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->paginate(15);

        return view('admin.marca.index', [
            'entities' => $entities,
            'filter' => $filter,
            'entity_status' => self::entity_status
        ]);
    }

    public function create()
    {
        return view('admin.marca.insere', ['entity_status' => self::entity_status]);
    }

    public function add()
	{
        $marca = Marca::create(Request::all());

        return redirect()->action('MarcaController@index')->with('status', 'Marca adicionada com sucesso');
	}

    public function show($id)
    {
        return view('admin.marca.mostra', [
            'entity' => Marca::findOrFail($id),
            'entity_status' => self::entity_status
        ]);
    }

    public function edit($id)
    {
        return view('admin.marca.edita', [
            'entity' => Marca::findOrFail($id),
            'entity_status' => self::entity_status
        ]);
    }

    public function update()
    {
        $marca = Marca::findOrFail(Request::input('id'));
        $marca->fill(Request::all());
        $marca->save();

        return redirect()->action('MarcaController@index')->with('status', 'Marca atualizado com sucesso');
    }

    public function delete($id)
    {
        Marca::findOrFail($id)->delete();

        return redirect()->action('MarcaController@index')->with('status', 'Marca removida com sucesso');
    }
}
