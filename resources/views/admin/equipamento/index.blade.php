@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Mostra Equipamentos
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Mostra Equipamentos</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                </a>
            </li>
            <li class="active">Equipamentos</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form id="filter_form" class="form-inline" action="{{ route('equipamento_index') }}" method="GET">
                    <div class="row">
                        <div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">Descrição</div>
                                    <input type="text" class="form-control" name="desc_filter" value="{{ $desc_filter }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">Serial</div>
                                    <input type="text" class="form-control" name="serial_filter" value="{{ $serial_filter }}">
                                </div>
                            </div>
                        </div>
                       
                        <div>
                            <div class="col-md-1">
                                <div id="filter_button2" class="form-group">
                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                                </div>
                             </div>

                            <div class="col-md-1">
                                <a href="{{ route('equipamento_new') }}" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
                            </div>
                        </div>
                   </div>

                    <div class="row">
             
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">Nota</div>
                                <input type="text" class="form-control" name="nota_filter" value="{{ $nota_filter }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">Setor</div>
                                <select class="form-control filter_input" name="setor_filter">
                                    <option value="">Todos</option>
                                    @foreach($setores as $setor)
                                        <option value="{{ $setor->id }}" {{ $setor->id == $setor_filter ? 'selected' : '' }}>{{ $setor->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">Grupo</div>
                                <select class="form-control filter_input" name="grupo_filter">
                                    <option value="">Todos</option>
                                    @foreach($grupos as $grupo)
                                        <option value="{{ $grupo->id }}" {{ $grupo->id == $grupo_filter ? 'selected' : '' }}>{{ $grupo->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                 
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-scrollable table-responsive" style="margin-top:20px;">
                    <table class="table table-striped table-bordered table-advance table-hover" id="equipamentos">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Código</th>
                                <th class=""><i class="glyphicon glyphicon-chevron-right"></i> Descrição</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Status</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Marca</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Fornecedor</th>
                                <th class="text-center"><i class="glyphicon glyphicon-chevron-right"></i> Chave/Serial</th>
                                <th class="text-center">Situação</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($entities as $entity)
                                <tr>
                                    <td class="col-md-1 text-center">{{ $entity->id }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->descricao }}</td>
                                    <td class="col-md-1 text-center">{{ $entity_status[$entity->status] }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->marca ? $entity->marca->descricao : '--' }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->fornecedor ? $entity->fornecedor->nome : '--' }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->chaveserial }}</td>
                                    <td class="col-md-1 text-center">{{ $entity->situacao }}</td>
                                    <td class="col-md-1 text-center">
                                        <a href="{{ route('equipamento_show', $entity->id) }}" title="Mostrar"><span class="glyphicon glyphicon-search"></span></a>
                                        <a href="{{ route('equipamento_edit', $entity->id) }}" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a href="{{ route('equipamento_delete', $entity->id) }}" class="confirmation" title="Deletar"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="col-md-1 text-center" colspan="7">
                                        <label>Nenhum equipamento encontrado com estes parâmetros</label>
                                    </td>
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                {!! $entities->appends(Input::except('page'))->render() !!}
            </div>
        </div>

    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Tem certeza que deseja apagar este Equipamento do Solid? Não há volta');
    });
</script>

  <script  src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" ></script>
   <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" ></script>
   <script type="text/javascript">
   
    $(document).ready(function() {
    
    var table = $('#equipamentos').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });


   </script>


@stop
