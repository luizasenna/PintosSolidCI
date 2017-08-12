<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\HistoricoEquipamento;
use App\Equipamento;
use Sentinel;
use DateTime;
use App\Setor;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;


class HistoricoEquipamentoController extends MainController
{

	const status = [
        0 => 'Atual',
        1 => 'Antigo'
    ];

    public function add() {

    	$id = Request::input('idequipamento'); 
    	DB::statement('UPDATE historicoequipamento SET status = 1 where idequipamento = '.$id);
        $mudasetor = Request::input('idsetor');
       // $mudagarantia = DateTime::createFromFormat('d/m/Y', Request::input('garantia'));
        $loja = Setor::where('id', '=', $mudasetor)->get(); 
        $idloja = $loja[0]->idloja;        
       
     
        $historico = HistoricoEquipamento::create(Request::all());
        $idatual = $historico->id;
        
        $equipamento = Equipamento::findOrFail(Request::input('idequipamento'));
         $warranty = DateTime::createFromFormat('d/m/Y', Request::input('mudagarantia'));

        // $m = $warranty->getTimestamp();
        $equipamento->idloja = $idloja;
        $equipamento->garantia = $warranty->getTimestamp();
        $equipamento->idsetor = $mudasetor;
     
        $usuario = Sentinel::getUser()->id; 
        $historico->idusuario = Sentinel::getUser()->id; 

      //  $historico->status = 0;
        $historico->save();
        $equipamento->save();
      
       // DB::update('UPDATE equipamentos SET idloja = '.$idloja. ' , garantia = '.$mudagarantia.' , idsetor='.$mudasetor.' where id = '.$id); 
        
     
        DB::statement('UPDATE historicoequipamento SET idusuario = '.$usuario.', status = 0 where id = '.$idatual);
        
        //return redirect()->action('EquipamentoController@show')->with('id', $id);
        return redirect()->intended('admin/equipamento/mostra/'.$id)->withInput()->with('status' , 'Histórico alterado');
    }

     public function delete($id)
    {
    	$historico = HistoricoEquipamento::findOrFail($id);
    	$equipamento = $historico->idequipamento;
        HistoricoEquipamento::findOrFail($id)->delete();

        return redirect()->intended('admin/equipamento/mostra/'.$equipamento)->with('status', 'Histórico de Equipamento removido com sucesso');
    }


}
