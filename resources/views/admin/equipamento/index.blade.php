@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Mostra Equipamentos
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Mostra Equipamentos</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li class="active">Equipamentos</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <form id="filter_form" class="form-inline" action="{{ route('equipamento_index') }}" method="GET">
                    <div id="filter_input" class="form-group">
                        <input type="search" class="form-control" placeholder="Inisira um nome e tecle enter" name="filter" value="{{ $filter }}">
                    </div>
                    <div id="filter_button" class="form-group">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <a href="{{ route('equipamento_new') }}" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-scrollable table-responsive" style="margin-top:20px;">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Código</th>
                                <th class=""><i class="glyphicon glyphicon-chevron-right"></i> Descrição</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Status</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Marca</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Fornecedor</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Chave/Serial</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entities as $entity)
                                <tr>
                                    <td class="col-md-1 text-center">{{ $entity->id }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->descricao }}</td>
                                    <td class="col-md-1 text-center">{{ $entity_status[$entity->status] }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->marca ? $entity->marca->descricao : '--' }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->fornecedor ? $entity->fornecedor->nome : '--' }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->chaveserial }}</td>
                                    <td class="col-md-1 text-center">
                                        <a href="{{ route('equipamento_show', $entity->id) }}" title="Mostrar"><span class="glyphicon glyphicon-search"></span></a>
                                        <a href="{{ route('equipamento_edit', $entity->id) }}" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="{{ route('equipamento_delete', $entity->id) }}" title="Deletar"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                {!! $entities->render() !!}
            </div>
        </div>

    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
