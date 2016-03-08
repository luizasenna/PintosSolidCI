@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Mostra Setor
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Mostra Setor</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('setor_index') }}">
                Setores
            </a>
        </li>
        <li class="active">
            Setor {{ $entity->id }}
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
                    <span class="panel-title">Loja</span>
                </div>
                <div class="panel-body">
                    {{ $entity->loja->descricao }}
                </div>
            </div>
        </div>
    </div>
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

