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
use App\Loja;
use App\TipoHistorico;
use App\Categoria;
use App\Grupo;

use Sentinel;
use DateTime;

use App\Http\Controllers\MainController;

class EquipamentoController extends MainController
{
    const voltage = [
        1 => '110v/220v',
        2 => '220v',
        3 => '110v',
        4 => '---'
    ];

    const hist = [
        0 => 'Atual',
        1 => 'Antigo',
        2 => 'Teste'
    ];

    public function index()
    {
        $desc_filter = Request::exists('desc_filter') ? Request::input('desc_filter') : '';
        $serial_filter = Request::exists('serial_filter') ? Request::input('serial_filter') : '';
        $setor_filter = Request::exists('setor_filter') ? Request::input('setor_filter') : '';
        $nota_filter = Request::exists('nota_filter') ? Request::input('nota_filter') : '';
        $grupo_filter = Request::exists('grupo_filter') ? Request::input('grupo_filter') : '';

        $setores = Setor::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $categorias = Categoria::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $grupos = Grupo::where('status', '=', 0)->orderBy('nome', 'asc')->get();


        $entities = Equipamento::where('descricao', 'LIKE', '%'.$desc_filter.'%')->where('status', '=', 0)->orderBy('id', 'desc');

        if ($serial_filter) {
            $entities = $entities->where('chaveserial','like', '%' . $serial_filter . '%');
        }

        if ($setor_filter != '') {
            $entities = $entities->where('idsetor', '=', $setor_filter);
        }

        if ($nota_filter != '') {
            $entities = $entities->where('nota', '=', $nota_filter);
        }

        if ($grupo_filter != '') {
            $entities = $entities->where('idgrupo', '=', $grupo_filter); 
        }

        $entities = $entities->paginate(15);

        return view('admin.equipamento.index', [
            'entities' => $entities,
            'desc_filter' => $desc_filter,
            'serial_filter' => $serial_filter,
            'setor_filter' => $setor_filter,
            'nota_filter' => $nota_filter,
            'grupo_filter' => $grupo_filter,
            'setores' => $setores,
            'categorias' => $categorias,
            'grupos' => $grupos,
            'hist' => self::hist,
            'entity_status' => self::entity_status
        ]);
    }

    public function create() {
        $users = User::orderBy('first_name', 'asc')->get();
        $fornecedores = Fornecedor::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $setores = Setor::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $marcas = Marca::where('status', '=', 0)->orderBy('descricao', 'asc')->get();
        $lojas = Loja::where('status', '=', 0)->orderBy('id', 'asc')->get();
        $categorias = Categoria::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $grupos = Grupo::where('status', '=', 0)->orderBy('nome', 'asc')->get();


        return view('admin.equipamento.insere', [
            'entity_status' => self::entity_status,
            'users' => $users,
            'fornecedores' => $fornecedores,
            'setores' => $setores,
            'marcas' => $marcas,
            'lojas' => $lojas,
            'voltage' => self::voltage,
            'categorias' =>$categorias, 
            'grupos' => $grupos

        ]);
    }

	public function add()
	{
        $equipamento = Equipamento::create(Request::all());
        $current_user = Sentinel::getUser();

        $buy_date = DateTime::createFromFormat('d/m/Y', Request::input('datacompra'));
        $warranty = DateTime::createFromFormat('d/m/Y', Request::input('garantia'));

        $equipamento->datacompra = $buy_date->getTimestamp();
        $equipamento->garantia = $warranty->getTimestamp();
        $equipamento->idcadastro = $current_user->id;

        $id = $equipamento->id;
        $equipamento->save();

        return redirect()->intended('admin/equipamento/mostra/'.$id)->with('status' , 'Equipamento adiconado com sucesso');
        //return redirect()->action('EquipamentoController@index')->with('status', 'Equipamento adiconado com sucesso');
	}

    public function show($id)
    {
        $setores = Setor::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        // $tipo_historico = TipoHistorico::where('status', '=', 0)->orderBy('descricao', 'asc')->get();
        $tipo_historico = TipoHistorico::all();

        return view('admin.equipamento.mostra', [
            'entity' => Equipamento::findOrFail($id),
            'entity_status' => self::entity_status,
            'voltage' => self::voltage,
            'tipo_historico' => $tipo_historico,
            'setores' => $setores,
            'hist' => self::hist
        ]);
    }

    public function edit($id)
    {
        $users = User::orderBy('first_name', 'asc')->get();
        $fornecedores = Fornecedor::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $setores = Setor::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $marcas = Marca::where('status', '=', 0)->orderBy('descricao', 'asc')->get();
        $categorias = Categoria::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $grupos = Grupo::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $lojas = Loja::where('status', '=', 0)->orderBy('id', 'asc')->get();

        return view('admin.equipamento.edita', [
            'entity' => Equipamento::findOrFail($id),
            'entity_status' => self::entity_status,
            'users' => $users,
            'fornecedores' => $fornecedores,
            'setores' => $setores,
            'marcas' => $marcas,
            'voltage' => self::voltage,
            'categorias' =>$categorias, 
            'grupos' => $grupos,
            'lojas' => $lojas
        ]);
    }

    public function update()
    {
        $equipamento = Equipamento::findOrFail(Request::input('id'));
        $equipamento->fill(Request::all());
        $buy_date = DateTime::createFromFormat('d/m/Y', Request::input('datacompra'));
        $warranty = DateTime::createFromFormat('d/m/Y', Request::input('garantia'));

        if($buy_date){
        $equipamento->datacompra = $buy_date->getTimestamp();
        }
        if($warranty){
        $equipamento->garantia = $warranty->getTimestamp();
        }
        $id = $equipamento->id;
        $equipamento->save();

        return redirect()->intended('admin/equipamento/mostra/'.$id)->with('status' , 'Equipamento editado com sucesso');
        //return redirect()->action('EquipamentoController@index')->with('status', 'Equipamento atualizado com sucesso');
    }

    public function delete($id)
    {
        Equipamento::findOrFail($id)->delete();

        return redirect()->action('EquipamentoController@index')->with('status', 'Equipamento removido com sucesso');
    }
}
