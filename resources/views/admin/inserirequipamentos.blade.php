@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Equipamentos
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Equipamentos</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>Pages</li>
                    <li class="active">Equipamentos</li>
                </ol>
            </section>
            <section class="content">
            

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Inserir Equipamento</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="status">Status</label>
  <div class="col-md-4">
    <select id="status" name="status" class="form-control">
      <option value="0">Ativo</option>
      <option value="1">Inativo</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="chaveserial">Chave / Serial</label>  
  <div class="col-md-4">
  <input id="chaveserial" name="chaveserial" type="text" placeholder="Chave ou Número de Série" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Categoria</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">Software</option>
      <option value="2">Hardware</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="descricao">Descrição</label>  
  <div class="col-md-4">
  <input id="descricao" name="descricao" type="text" placeholder="nome do equipamento" class="form-control input-md" required="">
  <span class="help-block">descreva o equipamento</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="datacompra">Data da Compra</label>  
  <div class="col-md-4">
  <input id="datacompra" name="datacompra" type="text" placeholder="Data" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="inserir">Inserir</label>
  <div class="col-md-4">
    <button id="inserir" name="inserir" class="btn btn-primary">Inserir</button>
  </div>
</div>

</fieldset>
</form>

            
            </section>

        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
