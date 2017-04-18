<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Loja;
use App\Grupo;
use App\Categoria;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\MainController;

class GrupoController extends MainController
{
	public function index()
	{
        $filter = Request::exists('filter') ? Request::input('filter') : '';

        $entities = Grupo::where('nome', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->paginate(15);

		return view('admin.grupo.index', [
			'entities' => $entities,
			'filter' => $filter,
			'entity_status' => self::entity_status
		]);
	}

	public function create()
	{
		$categorias = Categoria::where('status', '=', 0)->get();

		//$categorias = DB::Table('select * from categorias where status =0;')->get();

		return view('admin.grupo.insere', [
			'categorias' => $categorias,
			'entity_status' => self::entity_status]);
	}

	public function add()
	{
		$grupo = Grupo::create(Request::all());
		$grupo->save();
		return redirect()->action('GrupoController@index')->with('status', 'Grupo adicionado com sucesso');
	}


	public function show($id)
	{
		return view('admin.grupo.mostra', [
			'entity' => Grupo::findOrFail($id),
			'entity_status' => self::entity_status
		]);
	}

	public function edit($id)
	{
		return view('admin.grupo.edita', [
			'entity' => Grupo::findOrFail($id),
			'entity_status' => self::entity_status
		]);
	}

	public function update()
	{
		$loja = Grupo::findOrFail(Request::input('last_id'));
		$loja->fill(Request::all());
		$loja->save();

		return redirect()->action('GrupoController@index')->with('status', 'Loja atualizada com sucesso');
	}

	public function delete($id)
	{
		
	}
}
