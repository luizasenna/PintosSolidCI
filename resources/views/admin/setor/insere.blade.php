@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Inserir Setor
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
  <h1>Inserir Setor</h1>
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
      Novo
    </li>
  </ol>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="panel panel-primary">
        <div class="panel-heading">
          <span class="panel-title">Dados do novo Setor</span>
        </div>
        <div class="panel-body">

          <form class="form-horizontal" method="POST" action="{{ route('setor_adiciona') }}">

            {{ csrf_field() }}

            <div class="form-group">
              <label for="nome" class="col-sm-2 control-label">Nome</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
            </div>

            <div class="form-group">
              <label for="idloja" class="col-sm-2 control-label">Loja</label>
              <div class="col-sm-10">
                <select class="form-control" name="idloja">
                  @foreach($lojas as $loja)
                    <option value="{{ $loja->id }}">{{ $loja->descricao }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="status" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status">
                  <option value="0">{{ $setor_status[0] }}</option>
                  <option value="1">{{ $setor_status[1] }}</option>
                </select>
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

