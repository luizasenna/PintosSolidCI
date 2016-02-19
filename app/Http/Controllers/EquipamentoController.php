<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipamento;

class EquipamentoController extends Controller
{
    
     public function index()
    {
        $equipamentos = Equipamento::all();
		return view('admin.equipamento.index')->with('equipamentos', $equipamentos);
    }
     
     public function create()
    {
        return view('admin.fornecedor.insere');
    }

   public function busca()
	{   
		$equip = Request::input('nome');
		$equipamentos = Fornecedor::where('descricao', 'LIKE', '%'.$equip.'%')->get();
		if(empty($equipamentos)) {
			return "Não existe nada parecido com a sua busca";
		}
		return view('admin.equipamento.index')->with('equipamentos', $equipamentos);
		
	}
	
	public function adiciona()
	{
		
		 $nome = Request::input('nome');
		 $status = Request::input('status');
		 $observacoes = Request::input('observacoes');
		 $created_at = Request::input('created_at');
		 $ddd1 = Request::input('ddd1');
		 $telefone1 = Request::input('telefone1');
		 $ddd2 = Request::input('ddd2');
	     $telefone2 = Request::input('telefone2');
		 $ddd3 = Request::input('ddd3');
		 $telefone3 = Request::input('telefone3');
		 $logradouro = Request::input('logradouro');
		 $numero = Request::input('numero');
		 $complemento = Request::input('complemento');
		 $bairro = Request::input('bairro');
		 $cidade = Request::input('cidade');
		 $estado = Request::input('estado');
		 $cep = Request::input('cep');
		 $status = Request::input('status');
		 
	 		
		 
		 DB::insert('insert into fornecedores values (null, ?, ?, ? ,?, ?, 
		 ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, null, ?)', 
	    	array($nome, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $cep,  $observacoes, $ddd1, 
	    	$telefone1, $ddd2, $telefone2, $ddd3, $telefone3, $created_at, $status));

		 $fornecedores = Fornecedor::all();
		 return view('admin.fornecedor.index')->with('fornecedores', $fornecedores);
		
	}
	
	
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
