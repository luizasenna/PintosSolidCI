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
use Illuminate\Support\Facades\DB;
use Sentinel;
use DateTime;

use App\Http\Controllers\MainController;

class RelatorioController extends MainController
{


	public function equipamentoIndex(){

		$desc1_filter = Request::exists('desc1_filter') ? Request::input('desc1_filter') : '';
        $desc2_filter = Request::exists('desc2_filter') ? Request::input('desc2_filter') : '';
        $desc3_filter = Request::exists('desc3_filter') ? Request::input('desc3_filter') : '';
        $grupo_filter = Request::exists('grupo_filter') ? Request::input('grupo_filter') : '';
        $loja_filter = Request::exists('loja_filter') ? Request::input('loja_filter') : '';
        $setor_filter = Request::exists('setor_filter') ? Request::input('setor_filter') : '';
        $serial_filter = Request::exists('serial_filter') ? Request::input('serial_filter') : '';
        $nota_filter = Request::exists('nota_filter') ? Request::input('nota_filter') : '';

        $setores = Setor::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $categorias = Categoria::where('status', '=', 0)->orderBy('nome', 'asc')->get();
        $lojas = Loja::where('status', '=', 0)->get();
        $grupos = Grupo::where('status', '=', 0)->orderBy('nome', 'asc')->get();


		return view('admin/relatorio/equipamento/index',[
            'desc1_filter' => $desc1_filter,
            'desc2_filter' => $desc2_filter,
            'desc3_filter' => $desc3_filter,
            'serial_filter' => $serial_filter,
            'setor_filter' => $setor_filter,
            'nota_filter' => $nota_filter,
            'grupo_filter' => $grupo_filter,
            'loja_filter' => $loja_filter,
            'setores' => $setores,
            'categorias' => $categorias,
            'grupos' => $grupos,
            'lojas' => $lojas,
            'entity_status' => self::entity_status
      		  ]);

	}


	public function equipamentoLista(){

        $desc1_filter = Request::exists('desc1_filter') ? Request::input('desc1_filter') : '';
        $desc2_filter = Request::exists('desc2_filter') ? Request::input('desc2_filter') : '';
        $desc3_filter = Request::exists('desc3_filter') ? Request::input('desc3_filter') : '';
        $grupo_filter = Request::exists('grupo_filter') ? Request::input('grupo_filter') : '';
        $loja_filter = Request::exists('loja_filter') ? Request::input('loja_filter') : '';
        $setor_filter = Request::exists('setor_filter') ? Request::input('setor_filter') : '';
        $serial_filter = Request::exists('serial_filter') ? Request::input('serial_filter') : '';
        $nota_filter = Request::exists('nota_filter') ? Request::input('nota_filter') : '';

		$equipamentos = DB::select("
						select * from equipamentos
						where (descricao like '%no break%') 
						or (descricao like '%no-break%') 
						or (descricao like '%nobreak%')
						or (idgrupo = 2)");

      //  $equip =  Equipamento::all();
        /*$equip = $equip->where(function($equip){
                 $equip->where('descricao','like','%' . $desc1_filter . '%');
                 $equip->orWhere('descricao','like','%' . $desc2_filter . '%');
                 $equip->orWhere('descricao','like','%' . $desc3_filter . '%');
            })->get();
        */
        $equip = Equipamento::where('descricao','like','%' . $desc1_filter . '%')->orWhere('descricao','like','%' . $desc2_filter . '%')->orWhere('descricao','like','%' . $desc3_filter . '%');    

        if ($serial_filter) {
            $equip = $equip->where('chaveserial','like', '%' . $serial_filter . '%');
        }
        
        
        $total = 0;
        $total = $equip->count();

        $equip = $equip->paginate(30);

		return view('admin/relatorio/equipamento/lista',[
            'equipamentos' => $equipamentos,
            'equips' => $equip,
            'quantidade' => 1 ,
            'total' => $total,
            'desc1_filter' => $desc1_filter,
            'desc2_filter' => $desc2_filter,
            'desc3_filter' => $desc3_filter,
            'serial_filter' => $serial_filter,
            'setor_filter' => $setor_filter,
            'nota_filter' => $nota_filter,
            'grupo_filter' => $grupo_filter,
            'loja_filter' => $loja_filter
            ]);


	}


}