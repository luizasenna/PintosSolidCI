@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Mostra Loja
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

	<section class="content-header">
		<h1>Mostra Loja</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{ route('dashboard') }}">
					<i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
				</a>
			</li>
			<li class="active">Lojas</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-4">
				<form id="filter_form" class="form-inline" action="{{ route('loja_index') }}" method="GET">
					<div id="filter_input" class="form-group">
						<input type="search" class="form-control" placeholder="Inisira um nome e tecle enter" name="filter" value="{{ $filter }}">
					</div>
					<div id="filter_button" class="form-group">
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Buscar</button>
					</div>
				</form>
			</div>
			<div class="col-md-8">
				<a href="{{ route('loja_new') }}" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-scrollable table-responsive" style="margin-top:20px;">
					<table class="table table-striped table-bordered table-advance table-hover">
						<thead>
							<tr>
								<th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Código</th>
								<th class="hidden-xs"><i class="glyphicon glyphicon-chevron-right"></i> Nome</th>
								<th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Status</th>
								<th class="text-center">Ações</th>
							</tr>
						</thead>
						<tbody>
							@foreach($lojas as $loja)
								<tr>
									<td class="col-md-1 text-center">{{ $loja->id }}</td>
									<td class="col-md-9">{{ $loja->descricao }}</td>
									<td class="col-md-1 text-center">{{ $loja_status[$loja->status] }}</td>
									<td class="col-md-1 text-center">
										<a href="{{ route('loja_show', $loja->id) }}" title="Mostrar"><span class="glyphicon glyphicon-search"></span></a>
										<a href="{{ route('loja_edit', $loja->id) }}" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
										<a href="{{ route('loja_delete', $loja->id) }}" title="Deletar"><span class="glyphicon glyphicon-remove"></span></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
