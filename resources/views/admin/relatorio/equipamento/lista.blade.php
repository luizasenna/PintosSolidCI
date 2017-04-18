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

		<div class="row row-fluid row-horizon">
			<div class="col-md-12">
			<div class="panel panel-primary table-responsive">
			  <div class="panel-heading">Relatório</div>
			  <div class="panel-body">
			   
			  <div class="well"><p>Filtros Selecionados:</p>
			     <p>@if($desc1_filter)<b> Descrição1: </b> {{$desc1_filter}}@endif
			     / <b> Descrição2: </b>@if($desc2_filter) {{$desc2_filter}} @else --- @endif
			     / <b> Descrição3: </b>@if($desc3_filter){{$desc3_filter}} @else --- @endif
			     / <b> Serial: </b> @if($serial_filter) {{$serial_filter}} @else --- @endif
			     / @if($setor_filter)<b> Setor: </b>{{$setor_filter}}@endif
			     / @if($nota_filter)<b> Nota: </b>{{$nota_filter}}@endif
			     / @if($grupo_filter)<b> Grupo: </b> {{$grupo_filter}}@endif
			     / @if($loja_filter)<b> Loja: </b> {{$loja_filter}}@endif</p>
            
			  <p class="@if($total>0) text-info @else text-danger @endif"> Foram	encontrados <b>{{$total}} itens </b> para esta busca.</p>
			  </div>

			  <table class="table table-striped table-responsive table-condensed">
			 	 <tr>
			 	 	<th>###</th>
			  		<th>Descrição</th>
			  		<th>Marca</th>
			  		<th>Loja</th>
			  		<th>Setor</th>
			  		<th>Fornecedor</th>
			  		<th>Data_Compra</th>
					<th>Chave_Serial</th>
					<th>Valor_Compra</th>
			  	    <th>Nota</th>
			  		<th>Modelo</th>
			  		<th>Características</th>
			  		<th>Usuário</th>
			  		<th>Status</th>
			  		<th colspan="6">Observação</th>
			     </tr>
			  	@foreach($equips as $equipamento)
			  		<tr>
			  			<td>{{$quantidade++}}</td>
			  			<td>{{$equipamento->descricao}}</td>
			  			<td>{{ $equipamento->marca ? $equipamento->marca->descricao : '--' }}
			  			<td>@if($equipamento->setor) {{ $equipamento->setor->loja->descricao }}
                                @else --- @endif</td>
			  			<td>@if($equipamento->setor) {{ $equipamento->setor->nome }}
                                @else --- @endif</td>
			  			<td>{{ $equipamento->fornecedor ? $equipamento->fornecedor->nome : '--' }}</td>
			  			
			  			<td>{{date('d/m/Y', strtotime($equipamento->datacompra))}}</td>
			  			<td>{{$equipamento->chaveserial}}</td>
			  			<td> R$ {{$equipamento->valorcompra}}</td>
			  			<td>{{$equipamento->nota}}</td>
			  			<td>{{$equipamento->modelo}}</td>
			  			<td>{{$equipamento->caracteristicas}}</td>
			  			<td>{{$equipamento->usuariolocal}}</td>
			  			<td>@if($equipamento->status==0) Ativo @else Inativo @endif</td>
			  			<td colspan="6"><pre>{{$equipamento->observacoes}}</pre></td>
			  		</tr>
		 	    @endforeach
		 	   </table> 
		 	   </div>

		 	    <div class="row">
		            <div class="col-md-12 text-center">
		                {!! $equips->appends(Input::except('page'))->render() !!}
		            </div>
		        </div>
			  </div>
			</div>
		</div>
	</div>
	
@stop

{{-- page level scripts --}}
@section('footer_scripts')




@stop