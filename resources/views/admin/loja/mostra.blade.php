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
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('loja_index') }}">
                Lojas
            </a>
        </li>
        <li class="active">
            Loja {{ $loja->id }}
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">ID</span>
                </div>
                <div class="panel-body">
                    {{ $loja->id }}
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Descrição</span>
                </div>
                <div class="panel-body">
                    {{ $loja->descricao }}
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Status</span>
                </div>
                <div class="panel-body">
                    {{ $loja_status[$loja->status] }}
                </div>
            </div>
        </div>
    </div>
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

