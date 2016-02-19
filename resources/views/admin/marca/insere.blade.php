@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Inserir Marca de Equipamento
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">


<form class="form-horizontal" action="adiciona">
<fieldset>

<legend>Inserir Marca</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Nome">Nome</label>  
  <div class="col-md-5">
  <input id="Nome" name="Nome" type="text" placeholder="Insira um nome ou descrição" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="status">Ativa</label>
  <div class="col-md-5">
    <select id="status" name="status" class="form-control">
      <option value="0">Ativa</option>
      <option value="1">Inativa</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="observacoes">Observações</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Inserir</label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Inserir</button>
  </div>
</div>

<input type="hidden" name="created_at" value="{{date('Y-m-d')}}"   />

</fieldset>
</form>

    
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

