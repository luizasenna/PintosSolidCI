@extends('layouts/default')

{{-- Page title --}}
@section('title')
Solid - Base de Equipamentos do Centro de Informática da Pintos
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/jquery.circliful.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl-carousel/owl.theme.css') }}">
    <!--end of page level css-->
@stop

{{-- content --}}
@section('content')
   <div class="row">
	  <div class="col-lg-4 col-xs-4" style="margin-top:400px;">
           
     </div> 
     <div class="col-lg-4 col-xs-4" style="margin-top:300px;background-color:#555;">
           <a href="admin"><center><img src="{{ asset('assets/imagens/logopeq.png') }}" height="85%" alt="logo">
           <h4 style="color:#fff;">Entrar</h4></center></a>
     </div>
   </div>
 
@stop

