@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Relatório Customizado
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')
	<section class="content-header">
        <h1>Relatório de Equipamentos</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li class="active">Relatório de Equipamento</li>
        </ol>
    </section>
	
	<div class="content">
		<div class="row">
			<div class="col-md-12">
			<h5>Insira opções de filtro para gerar o relatório:</h5>
			<form lass="form-horizontal" action="{{ route('relatorio_lista') }}">
				{{ csrf_field() }}
				<div class="col-md-4">
					<div class="form-group">
					    <label for="descricao1">Descrição 1</label>
					    <input type="text" class="form-control" id="descricao1" name="desc1_filter" placeholder="Descrição do Equipamento">
					 </div>
					 
					<div class="form-group">
				  	<label for="grupo">Grupo</label>
				  		<select name="grupo_filter" class="form-control">
				  			<option>Todos</option>
				  			@foreach ($grupos as $grupo)
				  				<option value="$grupo->idgrupo">{{$grupo->nome}}</option>
				  			@endforeach
				  		</select>
				    </div>
				    <div class="form-group">
					    <label for="serial_filter">Serial</label>
					    <input type="text" class="form-control" id="descricao3" name="serial_filter" placeholder="Serial">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="descricao2">Descrição 2</label>
					    <input type="text" class="form-control" id="descricao2" name="desc2_filter" placeholder="Descrição do Equipamento">
				    </div> 

				    <div class="form-group">
				  	<label for="grupo">Loja</label>
				  		<select name="loja_filter" class="form-control">
				  			<option>Todas</option>
				  			@foreach($lojas as $loja)
				  			<option value="{{$loja->idloja}}">{{$loja->descricao}}</option>
				  			@endforeach
				  		</select>
				    </div>
				    <div class="form-group">
					  	<label for="nota_filter">Nota</label>
					 	<select name="nota_filter" class="form-control">
					 			<option>Todos</option>
					 			@foreach($setores as $setor)
					 				<option value="{{$setor->idsetor}}">{{$setor->nome}}</option>
					 			@endforeach
					 	</select>
				    </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="descricao3">Descrição 3</label>
					    <input type="text" class="form-control" id="descricao3" name="desc3_filter" placeholder="Descrição do Equipamento">
					</div>

					<div class="form-group">
					  	<label for="setor">Setor</label>
					 	<select name="setor_filter" class="form-control">
					 			<option>Todos</option>
					 			@foreach($setores as $setor)
					 				<option value="{{$setor->idsetor}}">{{$setor->nome}}</option>
					 			@endforeach
					 	</select>
				    </div>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-2"><button type="submit" class="btn btn-primary">Buscar</button></div>
				<div class="col-md-5"></div>			  			  
			  
			 
			</form>
			</div>
		</div>
	
	</div>
	
@stop

{{-- page level scripts --}}
@section('footer_scripts')




@stop