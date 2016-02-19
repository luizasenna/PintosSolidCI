<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fornecedor; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class FornecedorController extends Controller
{
   
     public function index()
    {
        $fornecedores = Fornecedor::all();
		return view('admin.fornecedor.index')->with('fornecedores', $fornecedores);
    }

   
     public function create()
    {
        return view('admin.fornecedor.insere');
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

	public function busca()
	{   
		$forne = Request::input('nome');
		$fornecedores = Fornecedor::where('nome', 'LIKE', '%'.$forne.'%')->get();
		if(empty($fornecedores)) {
			return "Não existe nada parecido com a sua busca";
		}
		return view('admin.fornecedor.index')->with('fornecedores', $fornecedores);
		
	}


    
    public function store(Request $request)
    {
        //
    }




   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
