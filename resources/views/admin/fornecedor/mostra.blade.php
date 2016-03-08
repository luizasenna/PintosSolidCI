@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Mostra Fornecedor
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Mostra Fornecedor</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('fornecedor_index') }}">
                Fornecedores
            </a>
        </li>
        <li class="active">
            Fornecedor {{ $entity->id }}
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
                    <span class="panel-title">Nome</span>
                </div>
                <div class="panel-body">
                    {{ $entity->nome }}
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
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Logradouro</span>
                </div>
                <div class="panel-body">
                    {{ $entity->logradouro }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Número</span>
                </div>
                <div class="panel-body">
                    {{ $entity->numero }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">CEP</span>
                </div>
                <div class="panel-body">
                    {{ $entity->cep }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Complemento</span>
                </div>
                <div class="panel-body">
                    {{ $entity->complemento }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Bairro</span>
                </div>
                <div class="panel-body">
                    {{ $entity->bairro }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Cidade</span>
                </div>
                <div class="panel-body">
                    {{ $entity->cidade }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Estado</span>
                </div>
                <div class="panel-body">
                    {{ $entity->estado }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Telefone 1</span>
                </div>
                <div class="panel-body">
                    ({{ $entity->ddd1 }}) {{ $entity->telefone1 }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Telefone 2</span>
                </div>
                <div class="panel-body">
                    ({{ $entity->ddd2 }}) {{ $entity->telefone2 }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Telefone 3</span>
                </div>
                <div class="panel-body">
                    ({{ $entity->ddd3 }}) {{ $entity->telefone3 }}
                </div>
            </div>
        </div>
    </div>
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

