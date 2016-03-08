<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Loja;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\MainController;

class LojaController extends MainController
{
	public function index()
	{
        $filter = Request::exists('filter') ? Request::input('filter') : '';

        $entities = Loja::where('descricao', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->paginate(15);

		return view('admin.loja.index', [
			'entities' => $entities,
			'filter' => $filter,
			'entity_status' => self::entity_status
		]);
	}

	public function create()
	{
		return view('admin.loja.insere', ['entity_status' => self::entity_status]);
	}

	public function add()
	{
		$loja = Loja::create(Request::all());
		return redirect()->action('LojaController@index')->with('status', 'Loja adicionada com sucesso');
	}


	public function show($id)
	{
		return view('admin.loja.mostra', [
			'entity' => Loja::findOrFail($id),
			'entity_status' => self::entity_status
		]);
	}

	public function edit($id)
	{
		return view('admin.loja.edita', [
			'entity' => Loja::findOrFail($id),
			'entity_status' => self::entity_status
		]);
	}

	public function update()
	{
		$loja = Loja::findOrFail(Request::input('last_id'));
		$loja->fill(Request::all());
		$loja->save();

		return redirect()->action('LojaController@index')->with('status', 'Loja atualizada com sucesso');
	}

	public function delete($id)
	{
		Loja::findOrFail($id)->delete();

		return redirect()->action('LojaController@index')->with('status', 'Loja removida com sucesso');
	}
}
