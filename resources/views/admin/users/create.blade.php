@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Adicionar Usuário
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/wizard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/wizard/jquery-steps/css/jquery.steps.css') }}">
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Adicionar Novo Usuário</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Painel
                </a>
            </li>
            <li>Usuários</li>
            <li class="active">Adicionar novo usuário</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="user-add" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                            Adicionar novo usuário
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="glyphicon glyphicon-chevron-up"></i>
                                </span>
                    </div>
                    <div class="panel-body">

                        <!-- errors -->
                        <div class="has-error">
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('group', '<span class="help-block">:message</span>') !!}
                            {!! $errors->first('pic', '<span class="help-block">:message</span>') !!}
                        </div>

                        <!--main content-->
                        <div class="col-md-12">

                            <!-- BEGIN FORM WIZARD WITH VALIDATION -->
                            <form class="form-wizard form-horizontal" action="{{ route('create/user') }}" method="POST" id="wizard-validation" enctype="multipart/form-data">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <!-- first tab -->
                                <h1>Perfil do usuário</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="first_name" class="col-sm-2 control-label">Nome *</label>
                                        <div class="col-sm-10">
                                            <input id="first_name" name="first_name" type="text" placeholder="Primeiro Nome" class="form-control required" value="{!! Input::old('first_name') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name" class="col-sm-2 control-label">Sobrenome *</label>
                                        <div class="col-sm-10">
                                            <input id="last_name" name="last_name" type="text" placeholder="Sobrenome" class="form-control required" value="{!! Input::old('last_name') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-Mail" type="text" class="form-control required email" value="{!! Input::old('email') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Senha *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Senha" class="form-control required" value="{!! Input::old('password') !!}" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirme a senha *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirm" name="password_confirm" type="password" placeholder="Digite novamente a senha " class="form-control required" value="{!! Input::old('password_confirm') !!}" />
                                        </div>
                                    </div>

                                    <p>(*) Obrigatório</p>

                                </section>

                                <!-- second tab -->
                                <h1>Bio</h1>

                                <section>



                                    <div class="form-group">
                                        <label for="dob" class="col-sm-2 control-label">Data de nascimento</label>
                                        <div class="col-sm-10">
                                            <input id="dob" name="dob" type="text" class="form-control" data-mask="99-99-9999" value="{!! Input::old('dob') !!}" placeholder="dd-mm-aaaa" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pic" class="col-sm-2 control-label">Foto de perfil</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    <img src="http://placehold.it/200x200" alt="profile pic">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Selecione a imagem</span>
                                                        <span class="fileinput-exists">Mudar</span>
                                                        <input id="pic" name="pic" type="file" class="form-control" />
                                                    </span>
                                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <label for="bio" class="col-sm-2 control-label">Bio</label>
                                        <div class="col-sm-10">
                                            <textarea name="bio" id="bio" class="form-control" rows="4">{!! Input::old('bio') !!}</textarea>
                                        </div>
                                    </div>

                                </section>

                                <!-- third tab -->
                            


                                <!-- fourth tab -->
                                <h1>Grupo do Usuário</h1>

                                <section>

                                    <div class="form-group">
                                        <label for="group" class="col-sm-2 control-label">Grupo *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control " title="Select group..." name="group" id="group">
                                                <option value="">Selecione</option>
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}" @if($group->id == Input::old('group')) selected="selected" @endif >{{ $group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="activate" class="col-sm-2 control-label"> Ativar Usuário</label>
                                        <div class="col-sm-10">
                                            <input id="activate" name="activate" type="checkbox" class="pos-rel p-l-30" value="1" @if(Input::old('activate')) checked="checked" @endif  >
                                        </div>
                                        <span>caso não ativado, será enviado um email de ativação.</span>
                                    </div>


                                </section>

                            </form>
                            <!-- END FORM WIZARD WITH VALIDATION -->
                        </div>
                        <!--main content end-->
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wizard/jquery-steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}"></script>
@stop