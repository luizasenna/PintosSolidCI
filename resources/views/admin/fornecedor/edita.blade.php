@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Editar Fornecedor
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Editar Fornecedor</h1>
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
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">Dados do Fornecedor</span>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('fornecedor_salva') }}">

                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $entity->id }}">

                        <div class="form-group">
                            <label for="nome" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nome" value="{{ $entity->nome }}">
                            </div>
                            <label for="status" class="col-sm-1 control-label">Status</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="status">
                                    @foreach($entity_status as $key => $value)
                                        <option value="{{ $key }}" {{ $entity->status == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="observacoes" class="col-sm-2 control-label">Observações</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="observacoes" name="observacoes">{{ $entity->observacoes }}</textarea>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="logradouro" class="col-sm-2 control-label">Logradouro</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="logradouro" value="{{ $entity->logradouro }}">
                            </div>
                            <label for="numero" class="col-sm-1 control-label">Número</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="numero" value="{{ $entity->numero }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="complemento" class="col-sm-2 control-label">Complemento</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="complemento" value="{{ $entity->complemento }}">
                            </div>

                            <label for="bairro" class="col-sm-1 control-label">Bairro</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="bairro" value="{{ $entity->bairro }}">
                            </div>
                            <label for="cep" class="col-sm-1 control-label">CEP</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="cep" value="{{ $entity->cep }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cidade" class="col-sm-2 control-label">Cidade</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="cidade" value="{{ $entity->cidade }}">
                            </div>
                            <label for="estado" class="col-sm-1 control-label">Estado</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="estado">
                                    @foreach($fornecedor_estados as $estado)
                                        <option value="{{ $estado }}" {{ $entity->estado == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ddd1" class="col-sm-2 control-label">Telefone 1</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="ddd1" placeholder="ddd" value="{{ $entity->ddd1 }}">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="telefone1" placeholder="telefone" value="{{ $entity->telefone1 }}">
                            </div>

                            <label for="ddd2" class="col-sm-2 control-label">Telefone 2</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="ddd2" placeholder="ddd" value="{{ $entity->ddd2 }}">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="telefone2" placeholder="telefone" value="{{ $entity->telefone2 }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ddd3" class="col-sm-2 control-label">Telefone 1</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="ddd3" placeholder="ddd" value="{{ $entity->ddd3 }}">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="telefone3" placeholder="telefone" value="{{ $entity->telefone3 }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>

    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

