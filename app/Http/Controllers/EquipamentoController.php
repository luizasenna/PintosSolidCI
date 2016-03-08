<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipamento;
use App\User;
use App\Fornecedor;
use App\Setor;
use App\Marca;

use Sentinel;
use DateTime;

use App\Http\Controllers\MainController;

class EquipamentoController extends MainController
{
    const voltage = [
        1 => '110v/220v',
        2 => '220v',
        3 => '110v',
    ];

    public function index()
    {
        $filter = '';

        if ( Request::exists('filter') ) {
            $filter = Request::input('filter');
        }

        $entities = Equipamento::where('descricao', 'LIKE', '%'.$filter.'%')->where('status', '=', 0)->paginate(15);

        return view('admin.equipamento.index', [ 'entities' => $entities, 'filter' => $filter, 'entity_status' => self::entity_status ]);
    }

    public function create() {
        $users = User::all();
        $fornecedores = Fornecedor::where('status', '=', 0)->get();
        $setores = Setor::where('status', '=', 0)->get();
        $marcas = Marca::where('status', '=', 0)->get();

        return view('admin.equipamento.insere', [
            'entity_status' => self::entity_status,
            'users' => $users,
            'fornecedores' => $fornecedores,
            'setores' => $setores,
            'marcas' => $marcas,
            'voltage' => self::voltage,
        ]);
    }

	public function add()
	{
        $equipamento = Equipamento::create(Request::all());
        $current_user = Sentinel::getUser();

        $buy_date = DateTime::createFromFormat('d/m/Y', Request::input('datacompra'));

        $equipamento->datacompra = $buy_date->getTimestamp();
        $equipamento->idcadastro = $current_user->id;
        $equipamento->save();

        return redirect()->action('EquipamentoController@index')->with('status', 'Equipamento adiconado com sucesso');
	}

    public function show($id)
    {
        return view('admin.equipamento.mostra', [
            'entity' => Equipamento::findOrFail($id),
            'entity_status' => self::entity_status,
            'voltage' => self::voltage,
        ]);
    }

    public function edit($id)
    {
        $users = User::all();
        $fornecedores = Fornecedor::where('status', '=', 0)->get();
        $setores = Setor::where('status', '=', 0)->get();
        $marcas = Marca::where('status', '=', 0)->get();

        return view('admin.equipamento.edita', [
            'entity' => Equipamento::findOrFail($id),
            'entity_status' => self::entity_status,
            'users' => $users,
            'fornecedores' => $fornecedores,
            'setores' => $setores,
            'marcas' => $marcas,
            'voltage' => self::voltage,
        ]);
    }

    public function update()
    {
        $equipamento = Equipamento::findOrFail(Request::input('id'));
        $equipamento->fill(Request::all());
        $equipamento->save();

        return redirect()->action('EquipamentoController@index')->with('status', 'Equipamento atualizado com sucesso');
    }

    public function delete($id)
    {
        Equipamento::findOrFail($id)->delete();

        return redirect()->action('EquipamentoController@index')->with('status', 'Equipamento removido com sucesso');
    }
}
