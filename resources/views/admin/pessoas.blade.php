@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Pessoas
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Pessoas</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>Pages</li>
                    <li class="active">Pessoas</li>
                </ol>
            </section>
            <section class="content">
            <table class="table table-striped table-bordered table-hover">
				<?php foreach ($pessoas as $p): ?>
					<tr>
						<td>Nome: <?= $p->nome ?></td>
						<td> Status: <?=$status = $p->status?>
						<?php if($status = 1) {echo " - Ativo";} else {echo " - Inativo";} ?></td>  
						<td><a href='pessoas/mostra'> <span class="glyphicon glyphicon-zoom-in"> </span></a></td>
				   </tr>"
				<?php endforeach  ?>	
			</table>
            
            </section>

        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
