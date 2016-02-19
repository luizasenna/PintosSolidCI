@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Marcas
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Marcas de Equipamentos</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Marcas de Equipamentos</li>
                </ol>
            </section>
            <section class="content">
			<div class="row">
				<div class="column col-md-12 col-sm-12 col-xs-12">	
					<table style="margin-top:10px;">
						<tr >
							<form class="form-horizontal" action="buscar">
							<fieldset>
							<td>
								<div class="form-group" style="width=600px;">
										<div class="col-md-10">
										<a href="#" class="btn btn-info"><input size="35" id="nome" name="nome" type="search" placeholder="Inisira um nome e tecle enter" class="form-control input-md">
										<span class="glyphicon glyphicon-search"></span>Buscar</a>
										</fieldset>
								</form>
							</td>
							<td>
								
								</div>
								</div>
								
							</td>
							<td>
										<a href="novo" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
							</td>
							</tr>
					</table>
			  </div>
			  <div class="column col-md-12 col-sm-12 col-xs-12">		 	
              <div class="table-scrollable" style="margin-top:"20px;">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                                    Código
                                                </th>
                                                <th class="hidden-xs">
                                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                                    Descrição
                                                </th>
                                                 <th class="hidden-xs">
                                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                                    Status
                                                </th>
                                                <th>
                                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                                    Observação
                                                </th>
                                                <th>Data de Criação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											 <?php foreach ($marcas as $p): ?>
											<tr {{$p->status<1 ? 'active' : '' }}>
											  <td><?= $p->id ?></td>
											  <td><?= $p->descricao ?></td>
											  <td><?= $p->status ?></td>
											  <td><?= $p->observacoes ?></td>
											  <td><?= date("d-m-Y", strtotime($p->created_at))?></td>
											
											</tr>
											<?php endforeach ?>
											
                                        </tbody>
                                    </table>
                                </div>
            </div></div>
            
            </section>

        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
