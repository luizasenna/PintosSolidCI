<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        | Solid CI Pintos
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{ asset('assets/css/panel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css"/>

    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body class="skin-josh">
    <header class="header">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('assets/imagens/logopeq.png') }}" height="85%" alt="logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Sentinel::getUser()->pic)
                                <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-responsive pull-left" height="35px" width="35px"/>
                            @else
                                <img src="{!! asset('assets/img/authors/avatar3.jpg') !!} " width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            @endif
                            <div class="riot">
                                <div>
                                    {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                @if(Sentinel::getUser()->pic)
                                    <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" class="img-circle img-bor"/>
                                @else
                                    <img src="{!! asset('assets/img/authors/avatar3.jpg') !!}" class="img-responsive img-circle" alt="User Image">
                                @endif
                                <p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
                            </li>
                            <!-- Menu Body -->

                            <li role="presentation"></li>
                            <li>
                                <a href="{{ route('users.update', Sentinel::getUser()->id) }}">
                                    <i class="livicon" data-name="gears" data-s="18"></i>
                                    Configurações
                                </a>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ URL::to('admin/lockscreen') }}">
                                        <i class="livicon" data-name="lock" data-s="18"></i>
                                        Suspender
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ URL::to('admin/logout') }}">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="nav_icons">
                        <ul class="sidebar_threeicons">
                            <li>
                                <a href="{{ URL::to('admin/loja/lista') }}">
                                    <i class="livicon" data-name="flag" title="Lojas" data-loop="true" data-color="#42aaca" data-hc="#42aaca" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('admin/setor/lista') }}">
                                    <i class="livicon" data-name="list-ul" title="Setores" data-loop="true" data-color="#e9573f" data-hc="#e9573f" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('admin/fornecedor/lista') }}">
                                    <i class="livicon" data-name="vector-square" title="Fornecedores" data-loop="true" data-color="#f6bb42" data-hc="#f6bb42" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::to('admin/equipamento/lista') }}">
                                    <i class="livicon" data-name="new-window" title="Equipamentos" data-loop="true" data-color="#37bc9b" data-hc="#37bc9b" data-s="25"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
                            <a href="{{ route('dashboard') }}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Painel</span>
                            </a>
                        </li>
                        <li {!! (Request::is('admin/loja') || Request::is('admin/loja/lista') || Request::is('admin/loja/novo')? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Lojas</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/loja/lista') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/loja/lista') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ver Todas
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/loja/nova') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/loja/nova') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Inserir
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {!! (Request::is('admin/setor/*') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Setores</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/setor/lista') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/setor/lista') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ver Todos
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/setor/novo') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/setor/novo') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Inserir
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {!! (Request::is('admin/marca') || Request::is('admin/marca/lista') || Request::is('admin/marca/adiciona')? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Marcas</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/marca/lista') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/marca/lista') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ver Todas
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/marca/novo') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/marca/novo') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Inserir
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {!! (Request::is('admin/fornecedor') || Request::is('admin/fornecedor/lista') || Request::is('admin/fornecedor/adiciona')? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Fornecedores</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/fornecedor/lista') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/fornecedor/lista') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ver Todos
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/fornecedor/novo') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/fornecedor/novo') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Inserir
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {!! (Request::is('admin/equipamentos') || Request::is('admin/equipamentos/lista') || Request::is('admin/equipamentos/adiciona')? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Equipamentos</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/equipamento/lista') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/equipamento/lista') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ver Todas
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/equipamento/nova') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/equipamento/nova') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Inserir
                                    </a>
                                </li>
                            </ul>
                        </li>


                       <!-- <li {!! (Request::is('admin/form_builder') || Request::is('admin/form_builder2') || Request::is('admin/buttonbuilder') || Request::is('admin/gridmanager') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Construtores</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/form_builder') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/form_builder') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Form Builder
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/form_builder2') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/form_builder2') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Form Builder 2
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/buttonbuilder') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/buttonbuilder') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Button Builder
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/gridmanager') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/gridmanager') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Page Builder
                                    </a>
                                </li>
                            </ul>
                        </li>
               -->

                        <li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Usuários</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/users') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Usuárioss
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/users/create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Adicionar Novo
                                    </a>
                                </li>
                                <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ver Perfil
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/deleted_users') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Deletar Usuários
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {!! (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Grupos</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/groups') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/groups') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Grupos
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/groups/create') ? 'class="active" id="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/groups/create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Adicionar Novo
                                    </a>
                                </li>
                            </ul>
                        </li>



                      <!--  <li {!! (Request::is('admin/invoice') || Request::is('admin/blank')  ? 'class="active"' : '') !!}>
                            <a href="#">
                                <i class="livicon" data-name="flag" data-c="#418bca" data-hc="#418bca" data-size="18" data-loop="true"></i>
                                <span class="title">Páginas</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/lockscreen') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/lockscreen') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Suspender
                                    </a>
                                </li>
                                <li {!! (Request::is('admin/invoice') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/invoice') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ordem de Serviço
                                    </a>

                                <li {!! (Request::is('admin/login2') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/login2') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Login 2
                                    </a>
                                </li>

                                <li {!! (Request::is('admin/blank') ? 'class="active"' : '') !!}>
                                    <a href="{{ URL::to('admin/blank') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Em Branco
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                        <!-- Menus generated by CRUD generator -->
                        @include('admin/layouts/menu')
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        <aside class="right-side">

            <!-- Notifications -->
            @include('admin/layouts/notification')

            <!-- Content -->
            @yield('content')

        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    @if (Request::is('admin/form_builder2') || Request::is('admin/gridmanager') || Request::is('admin/portlet_draggable') || Request::is('admin/calendar'))
        <script src="{{ asset('assets/vendors/form_builder1/js/jquery.ui.min.js') }}"></script>
    @endif
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/metisMenu.js') }}" type="text/javascript"> </script>
    <script src="{{ asset('assets/vendors/holder-master/holder.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"> </script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
</body>
</html>
