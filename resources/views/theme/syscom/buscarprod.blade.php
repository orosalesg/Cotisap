@extends('theme.body')

@section('company', 'Alianza Electrica')

@section('content')

    <div class="main-wrapper">
      
      @include('theme.topheader')

      <div class="an-page-content">
        <div class="an-sidebar-nav js-sidebar-toggle-with-click">

          @include('theme.widgets.sidebar-widget')

          @include('theme.menu')
          
        </div>

        <div class="an-content-body home-body-content">
          
          <div class="an-breadcrumb wow fadeInUp">
            <ol class="breadcrumb">
              <li><a href="#">{{ 'Inicio' }}</a></li>
              <li><a href="#">{{ 'Syscom' }}</a></li>
              <li class="active">{{ 'Buscar productos' }}</li>
            </ol>
          </div>

          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>{{ 'Buscar productos' }}</h2>
            </div>
          </div>

          @include('theme.widgets.syscom-buscarprod-fragment')

        </div>
      </div>

      @include('theme.widgets.footer')

    </div> 

@endsection