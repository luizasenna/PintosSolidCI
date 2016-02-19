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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
		$setores = Setor::all();
		return view('admin.setor.index')->with('setores', $setores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$lojas = Loja::select('descricao');
        return view('admin.setor.insere')->with('lojas', $lojas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function adiciona()
	{
		
		
		 $nome = Request::input('nome');
		 $idloja = Request::input('idloja');
		 $status = Request::input('status');
		// $created_at = date("Y-m-d");
		 
		  DB::insert('insert into setores values (null, ?, ?, ?, null,null)', 
	    	array($nome, $status, $idloja));

		 $setores = Setor::all();
		return view('admin.setor.index')->with('setores', $setores);
		
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
