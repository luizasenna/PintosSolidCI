<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setor;
use App\Loja;
use Illuminate\Support\Facades\DB;

class SetorController extends Controller
{
    const setor_status = [
        0 => 'Ativo',
        1 => 'Inativo'
    ];

    public function index()
    {
        $filter = "";

        if ( Request::exists('filter') ) {
            $filter = Request::input('filter');
        }

        $setores = Setor::where('nome', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->get();

		return view('admin.setor.index', ['setores' => $setores, 'filter' => $filter, 'setor_status' => self::setor_status]);
    }

    public function create()
    {
        $lojas = Loja::all();
        return view('admin.setor.insere', ['lojas' => $lojas, 'setor_status' => self::setor_status]);
    }

    public function add()
	{
        $setor = Setor::create(Request::all());

        return redirect()->action('SetorController@index')->with('status', 'Setor adicionado com sucesso');
	}

    public function show($id)
    {
        return view('admin.setor.mostra', ['setor' => Setor::findOrFail($id), 'setor_status' => self::setor_status]);
    }

    public function edit($id)
    {
        return view('admin.setor.edita', ['setor' => Setor::findOrFail($id), 'setor_status' => self::setor_status]);
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
