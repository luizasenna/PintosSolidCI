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
    <h1>Detalhes do Equipamento {{ $entity->descricao }} </h1>
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
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"><span class="glyphicon glyphicon-bookmark"></span>
                    Detalhes</span>
                    <a class="btn btn-warning pull-right btn-sm" style="margin-bottom: 5px;" href="/admin/equipamento/edita/{{$entity->id}}" role="button"> <span class="glyphicon glyphicon-edit"></span> Editar este equipamento</a>
                </div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <table class="table table-stripped">
                             <tr>
                                <th>Descricao</th> <td> {{ $entity->descricao }} </td>
                            </tr>
                            <tr>
                                <th>Código Solid</th> <td>{{ $entity->id }}</td>
                            </tr>
                            <tr>
                                <th>Localização Atual</th>
                                <td><b>Loja: </b>
                                @if($entity->loja)
                                    {{$entity->idloja}}
                                    {{ $entity->loja->descricao }}
                                @else
                                    Loja não encontrada
                                @endif    
                                <b> - Setor: </b>
                                @if($entity->setor)
                                    {{ $entity->setor->nome }}
                                @else
                                    Setor não encontrado
                                @endif</td>
                            </tr>
                            <tr>
                            <th>Código de Barras</th>                         
                            <td>@if($entity->codigobarras){{ $entity->codigobarras }}@endif</td>
                            </tr>
                            
                    </table>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="well">
                            <span class="text-right pull-right">
                                Status:{{ $entity_status[$entity->status] }}
                            </span>
                            <hr/>
                            <h5  class="pull-center text-center">Número de Série / Chave Serial</h5> 
                            <h3 class="text-primary pull-center text-center">{{ $entity->chaveserial }}</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <h4><span class="glyphicon glyphicon-tag"></span> Características</h4>
                    <table class="table table-stripped">
                         <tr>
                            <th>Marca</th>
                            <td>
                                  @if($entity->marca)
                                    {{ $entity->marca->descricao }}
                                @else
                                    Marca não encontrada
                                @endif
                            </td>
                            <th>Modelo</th>
                            <td> @if($entity->modelo){{ $entity->modelo }}@endif</td>
                        </tr>
                         <tr>
                            <th>Categoria</th>
                            <td>
                                @if($entity->categoria)
                                    {{ $entity->categoria->nome }}
                                @else
                                    Categoria não encontrada
                                @endif
                            </td>
                            <th>Grupo</th>
                            <td>
                                @if($entity->grupo)
                                    {{ $entity->grupo->nome }}
                                @else
                                    Grupo não encontrado
                                @endif
                            </td>
                        </tr>
                         <tr>
                            <th>Voltagem</th>
                            <td>
                                @if($entity->voltagem) {{ array_get($voltage, $entity->voltagem, '--') }} @endif
                            </td>
                            <th>Garantia</th>
                            <td>
                                 @if($entity->garantia) {{ date('d/m/Y', strtotime($entity->garantia)) }}
                                 @else ---
                                 @endif
                            </td>
                            
                        </tr>
                        

                    </table>
                    </div>
                    <div class="col-md-6">
                        <h4><span class="glyphicon glyphicon-usd"></span> Nota Fiscal</h4>
                    <table class="table table-stripped">
                         <tr>
                            <th>Nr Nota</th>
                            <td>
                                 @if($entity->nota){{ $entity->nota }}@endif
                            </td>
                            <th>Data da compra</th>
                            <td>@if($entity->datacompra){{ date('d/m/Y', strtotime($entity->datacompra)) }}@endif</td>
                        </tr>
                         <tr>
                            <th>Fornecedor</th>
                            <td>
                                 @if($entity->fornecedor)
                                    {{ $entity->fornecedor->nome }}
                                @else
                                    Fornecedor não encontrado
                                @endif
                            </td>
                           <th>Valor de compra</th>
                            <td>R$ @if($entity->valorcompra){{ $entity->valorcompra }}@endif</td>
                        </tr>
                       
                        </table>
                       
                       
                    </div>
                    <div class="col-sm-12">
                         <table class="table table-stripped">
                             <tr>
                             <th>Cadastro</th>
                            <td> @if($entity->cadastro)
                                    {{ $entity->cadastro->first_name }} {{ $entity->cadastro->last_name }}
                                @else
                                    Usuário não encontrado
                                @endif
                            </td>
                            <th>Orçamento</th>
                            <td> @if($entity->orcador)
                                    {{ $entity->orcador->first_name }} {{ $entity->orcador->last_name }}
                                @else
                                    Usuário orçador não encontrado
                                @endif
                            </td>
                           <th>Aprovação</th>
                            <td>
                                  @if($entity->aprovador)
                                    {{ $entity->aprovador->first_name }} {{ $entity->aprovador->last_name }}
                                @else
                                    Usuário aprovador não encontrado
                                @endif
                            </td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
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
            <div class="panel panel-primary">
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
            <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">Situacao</span>
                </div>
                <div class="panel-body">
                        {{ $entity->situacao }}
               </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div id="history_panel" class="panel panel-primary">
                <div class="panel-heading">
                    <label>Histórico do Equipamento</label><button class="btn btn-warning pull-right" type="button" data-toggle="modal" data-target="#create_history">Adicionar</button>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Setor</th>
                            <th>Tipo</th>
                            <th>Observação</th>
                            <th>Usuário</th>
                            <th>Status</th>
                            <th>Data de Criação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($entity->historico as $entry)
                            <tr class="@if($entry->status==0) text-primary @endif">
                                <td>
                                    {{ $entry->setor ? $entry->setor->nome : '--' }}
                                </td>
                                <td>{{ $entry->tipo ? $entry->tipo->descricao : '--' }}
                                <td>{{$entry->observacao}}</td>
                                <td>{{ $entry->usuario ? $entry->usuario->first_name : '--' }}</td>
                                <td>@if($entry->status){{ array_get($hist, $entry->status, '--') }}@endif </td>
                                <td>{{ date("d/m/Y", strtotime($entry->created_at))}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="col-md-1 text-center" colspan="6">
                                    <label>Nenhum registro de histórico encontrado para este equipamento</label>
                                </td>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create_history" tabindex="-1" role="dialog" aria-labelledby="create_history_label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="create_history_label">Adicionar Histórico ao Equipamento {{ $entity->descricao }}</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" method="POST" action="{{ route('historico_equipamento_adiciona') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="idequipamento" value="{{ $entity->id }}">

                        <div class="form-group">
                            <label for="observacao" class="col-sm-2 control-label">Observação</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="observacao" name="observacao"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Setor</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="idsetor">
                                    @foreach($setores as $setor)
                                        <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="description" class="col-sm-3  control-label">Tipo Histórico</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="idtipohistorico">
                                    @foreach($tipo_historico as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                         <div class="form-group">    
                            <label for="garantia" class="col-sm-3 control-label">Nova Garantia</label>
                           
                           

                            <div class="col-sm-9">
                               <input type="text" class="form-control" id="garantianova" name="mudagarantia" value="{{ date('d/m/Y', strtotime($entity->garantia)) }}">
                         


                            </div>
                             <div class=" form-group" >
                             <div class="col-sm-5 col-sm-push-4" style="margin-top:20px;">
                                <input class="form-control btn btn-primary" type="submit" name="Salvar" value="Salvar">
                            </div>
                            </div>
                        </div>

                        <!-- <div class="form-group"> -->

                        <!-- </div> -->

<!-- 'observacao', 'idequipamento', 'idsetor', 'idusuario', 'idtipohistorico' -->

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    
                </div>
            </div>
        </div>
    </div>

</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript">

   
    $('#garantianova').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        todayBtn: 'linked',
        todayHighlight: true,
    });

</script>
@stop

