@extends('theme.body')

@section('company', 'Alianza Electrica')


@section('custom-styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection
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
              <li><a href="{{ URL::route('dashboard') }}">Admin Panel</a></li>
              <li><a >Administración</a></li>
              <li class="active">Articulos</li>
            </ol>
          </div> <!-- end AN-BREADCRUMB -->

          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>Articulos</h2>
            </div>
          </div> <!-- end AN-BODY-TOPBAR -->

          @include('theme.widgets.articulos-fragment')

        </div>
      </div>

      @include('theme.widgets.footer')

    </div> 

@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    var route = "{{Request::url()}}";
  </script>
  <script src="{{ asset('assets/js/sweetalert.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/articulos.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>
@endsection