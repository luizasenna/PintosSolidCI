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


<form class="form-horizontal" action="adiciona">
<fieldset>

<!-- Form Name -->
<legend>Inserir Setor</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="descricao">Nome</label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="Insira o nome da Loja" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="status">Loja</label>
  <div class="col-md-4">
    <select id="idloja" name="idloja" class="form-control">
      <option value="1">Magazine</option>
      <option value="3">Riverside</option>
      <option value="5">Rio Branco</option>
      <option value="6">Valter Alencar</option>
      <option value="8">Calçados</option>
      <option value="9">Frei Serafim</option>
      <option value="10">Zequinha Freire</option>
      <option value="11">Pintos Shopping</option>
      <option value="12">Rio Poty</option>
    </select>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="status">Status</label>
  <div class="col-md-4">
    <select id="status" name="status" class="form-control">
      <option value="0">Ativa</option>
      <option value="1">Inativa</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group"><label class="col-md-4 control-label" for="status"></label>
    <div class="col-md-4">
    <button name="enviar" type="submit" class="btn btn-primary">Inserir</button>
  </div>
</div>

</fieldset>
</form>
    
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

