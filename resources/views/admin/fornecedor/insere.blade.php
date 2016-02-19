@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Inserir Loja
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
		<legend>Inserir Fornecedor</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nome">Nome</label>  
		  <div class="col-md-5">
		  <input id="nome" name="nome" type="text" placeholder="nome do fornecedor" class="form-control input-md" required="">
			
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="status">Status</label>
		  <div class="col-md-5">
			<select id="status" name="status" class="form-control">
			  <option value="0">Ativo</option>
			  <option value="1">Inativo</option>
			</select>
		  </div>
		</div>
		
		<hr />
		<h4><center>Contato</center></h4>
		<hr/>
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="ddd1">Telefone 1</label> 
 
		  <div class="col-md-4">
		  <input id="ddd1" name="ddd1" type="text" placeholder="DDD" class="form-control input-md">
		  <input id="telefone1" name="telefone1" type="text" placeholder="Telefone 1" class="form-control input-md">	 
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="ddd1">Telefone 2</label> 
 
		  <div class="col-md-4">
		  <input id="ddd2" name="ddd2" type="text" placeholder="DDD" class="form-control input-md">
		  <input id="telefone2" name="telefone2" type="text" placeholder="Telefone 2" class="form-control input-md">	 
		  </div>
		</div>

			<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="ddd1">Telefone 3</label> 
 
		  <div class="col-md-4">
		  <input id="ddd3" name="ddd3" type="text" placeholder="DDD" class="form-control input-md">
		  <input id="telefone3" name="telefone3" type="text" placeholder="Telefone 3" class="form-control input-md">	 
		  </div>
		</div>

		
		<hr />
		<h4><center>Endereço</center></h4>
		<hr/>	
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="logradouro">Logradouro</label>  
		  <div class="col-md-4">
		  <input id="logradouro" name="logradouro" type="text" placeholder="Logradouro" class="form-control input-md">
			
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="numero">Número</label>  
		  <div class="col-md-4">
		  <input id="numero" name="numero" type="text" placeholder="Número" class="form-control input-md">
			
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="complemento">Complemento</label>  
		  <div class="col-md-4">
		  <input id="complemento" name="complemento" type="text" placeholder="Complemento" class="form-control input-md">
			
		  </div>
		</div>


		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="bairro">Bairro</label>  
		  <div class="col-md-4">
		  <input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control input-md">
			
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="cidade">Cidade</label>  
		  <div class="col-md-4">
		  <input id="cidade" name="cidade" type="text" placeholder="Cidade" class="form-control input-md">
			
		  </div>
		</div>
		
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="cep">Cep</label>  
		  <div class="col-md-4">
		  <input id="cep" name="cidade" type="text" placeholder="Cep" class="form-control input-md">
			
		  </div>
		</div>
		

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="estado">Estado</label>
		  <div class="col-md-4">
			<select id="estado" name="estado" class="form-control">
			  <option value="Piaui">Piaui</option>
			  <option value="Acre">Acre</option>
			  <option value="Alagoas">Alagoas</option>
			  <option value="Amapá">Amapá</option>
			  <option value="Amazonas">Amazonas</option>
			  <option value="Bahia">Bahia</option>
			  <option value="Ceará">Ceará</option>
			  <option value="Distrito Federal">Distrito Federal</option>
			  <option value="Espirito Santo">Espirito Santo</option>
			  <option value="Goiás">Goiás</option>
			  <option value="Maranhão">Maranhão</option>
			  <option value="Mato Grosso">Mato Grosso</option>
			  <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
			  <option value="Minas Gerais">Minas Gerais</option>
			  <option value="Pará">Pará</option>
			  <option value="Paraíba">Paraíba</option>
			  <option value="Paraná">Paraná</option>
			  <option value="Pernambuco">Pernambuco</option>
			  <option value="Piauí">Piauí</option>
			  <option value="Rio de Janeiro">Rio de Janeiro</option>
			  <option value="Rio Grande do Norte">Rio Grande do Norte</option>
			  <option value="Rio Grande do Sul">Rio Grande do Sul</option>
			  <option value="Rondônia">Rondônia</option>
			  <option value="Roraima">Roraima</option>
			  <option value="Santa Catarina">Santa Catarina</option>
			  <option value="São Paulo">São Paulo</option>
			  <option value="Sergipe">Sergipe</option>
			  <option value="Tocatins">Tocatins</option>
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

		<input type="hidden" name="created_at" value="{{date('Y-m-d')}}"   />

		<!-- Button -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="enviar"></label>
		  <div class="col-md-4">
			<button id="enviar" name="enviar" class="btn btn-primary">Inserir</button>
		  </div>
		</div>
		

		</fieldset>
</form>



</section>
    
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop

