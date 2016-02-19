<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Marca;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class MarcaController extends Controller
{
    
    public function index()
    {
        $marcas = Marca::all();
		return view('admin.marca.index')->with('marcas', $marcas);
    }


    public function create()
    {
        return view('admin.marca.insere');
    }

    public function adiciona()
	{
		
		 $descricao = Request::input('Nome');
		 $status = Request::input('status');
		 $observacoes = Request::input('observacoes');
		 $created_at = Request::input('created_at');
		 
		 DB::insert('insert into marcas values (null, ?, ?, ?, ?,null)', 
	    	array($descricao, $status, $observacoes, $created_at));

		 $marcas = Marca::all();
		return view('admin.marca.index')->with('marcas', $marcas);
		
	}
    
    
    public function busca()
	{   
		$nome = Request::input('nome');
		$marcas = Marca::where('descricao', 'LIKE', '%'.$nome.'%')->get();
		if(empty($marcas)) {
			return "Não existe nada parecido com a sua busca";
		}
		return view('admin.marca.index')->with('marcas', $marcas);
		
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
