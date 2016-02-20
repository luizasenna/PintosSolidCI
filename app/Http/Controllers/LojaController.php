<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Loja;
use Illuminate\Support\Facades\DB;


class LojaController extends Controller
{
	const loja_status = [
		0 => 'Ativa',
		1 => 'Inativa'
	];

	public function index()
	{
        $filter = '';

        if ( Request::exists('filter') ) {
            $filter = Request::input('filter');
        }

        $lojas = Loja::where('descricao', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->get();

		return view('admin.loja.index', [ 'lojas' => $lojas, 'filter' => $filter, 'loja_status' => self::loja_status ]);
	}

	public function create()
	{
		return view('admin.loja.insere', ['loja_status' => self::loja_status]);
	}

	public function add()
	{
		$loja = Loja::create(Request::all());
		return redirect()->action('LojaController@index')->with('status', 'Loja adicionada com sucesso');
	}


	public function show($id)
	{
		return view('admin.loja.mostra', ['loja' => Loja::findOrFail($id), 'loja_status' => self::loja_status]);
	}

	public function edit($id)
	{
		return view('admin.loja.edita', ['loja' => Loja::findOrFail($id), 'loja_status' => self::loja_status]);
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
