@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Mostra Equipamento
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Mostra Equipamento</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('equipamento_index') }}">
                Equipamentos
            </a>
        </li>
        <li class="active">
            Equipamento {{ $entity->id }}
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Código</span>
                </div>
                <div class="panel-body">
                    {{ $entity->id }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Descrição</span>
                </div>
                <div class="panel-body">
                    {{ $entity->descricao }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Status</span>
                </div>
                <div class="panel-body">
                    {{ $entity_status[$entity->status] }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Data da Compra</span>
                </div>
                <div class="panel-body">
                    {{ date('d/m/Y', strtotime($entity->datacompra)) }}
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Chave/Serial</span>
                </div>
                <div class="panel-body">
                    {{ $entity->chaveserial }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Voltagem</span>
                </div>
                <div class="panel-body">
                    {{ $voltage[$entity->voltagem] }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Modelo</span>
                </div>
                <div class="panel-body">
                    {{ $entity->modelo }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Valor</span>
                </div>
                <div class="panel-body">
                    R$ {{ $entity->valorcompra }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Código de Barras</span>
                </div>
                <div class="panel-body">
                    {{ $entity->codigobarras }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Nota</span>
                </div>
                <div class="panel-body">
                    {{ $entity->nota }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Observações</span>
                </div>
                <div class="panel-body">
                    {{ $entity->observacoes }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Características</span>
                </div>
                <div class="panel-body">
                    {{ $entity->caracteristicas }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Fornecedor</span>
                </div>
                <div class="panel-body">
                    @if($entity->fornecedor)
                        {{ $entity->fornecedor->nome }}
                    @else
                        Fornecedor não encontrado
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Setor</span>
                </div>
                <div class="panel-body">
                    @if($entity->setor)
                        {{ $entity->setor->nome }}
                    @else
                        Setor não encontrado
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Marca</span>
                </div>
                <div class="panel-body">
                    @if($entity->marca)
                        {{ $entity->marca->descricao }}
                    @else
                        Marca não encontrada
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Usuário Orçador</span>
                </div>
                <div class="panel-body">
                    @if($entity->orcador)
                        {{ $entity->orcador->first_name }} {{ $entity->orcador->last_name }}
                    @else
                        Usuário orçador não encontrado
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Usuário Aprovador</span>
                </div>
                <div class="panel-body">
                    @if($entity->aprovador)
                        {{ $entity->aprovador->first_name }} {{ $entity->aprovador->last_name }}
                    @else
                        Usuário aprovador não encontrado
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Usuário de Cadastro</span>
                </div>
                <div class="panel-body">
                    @if($entity->cadastro)
                        {{ $entity->cadastro->first_name }} {{ $entity->cadastro->last_name }}
                    @else
                        Usuário de cadastro não encontrado
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Usuário Local</span>
                </div>
                <div class="panel-body">
                    {{ $entity->usuariolocal }}
                </div>
            </div>
        </div>
    </div>

</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

