@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Lojas
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Lojas</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Lojas</li>
                </ol>
            </section>
            <section class="content">
			<div class="row">
				<div class="column col-md-12 col-sm-12 col-xs-12">	
					<table style="margin-top:10px;">
						<tr>
							<form class="form-horizontal" action="buscarloja">
							<fieldset>
							<td>
								<div class="form-group">
									<label class="col-md-4 control-label" for="button1id" id="nome" name="nome">Buscar Loja</label>
										<div class="col-md-8">
										<input id="" name="" type="search" placeholder="Inisira um nome" class="form-control input-md">
							</td>
							<td>
								<button id="button2id" name="button2id" class="btn btn-danger">Buscar</button>
								</div>
								</div>
								</fieldset>
								</form>
							</td>
							<td>
										<a href="nova" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
							</td>
							</tr>
					</table>
			  </div>
			  <div class="column col-md-12 col-sm-12 col-xs-12">		 	
              <div class="table-scrollable">
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
