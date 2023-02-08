@extends('theme.body')

@section('custom-styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <style type="text/css">
    .search-results .row{
      margin-bottom: 7px;
      padding-bottom: 7px;
      padding-top: 7px;
    }
    .search-results .row:nth-child(odd){
      background-color: rgb(225, 225, 225);
    }
    .search-results .headers h5{
      font-weight: bolder;
    }
  </style>
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
              <li><a href="{{ URL::route('dashboard')}} ">Admin Panel</a></li>
              <li><a>Adminitración</a></li>
              <li class="active">Resultados</li>
            </ol>
          </div> <!-- end AN-BREADCRUMB -->
          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>Resultados de búsqueda</h2>
            </div>
          </div> <!-- end AN-BODY-TOPBAR -->
          
          @include('theme.widgets.resultados-busqueda')

        </div>
      </div>

      @include('theme.widgets.footer')
      
    </div> 

@endsection

@section('scripts')
  <script src="{{ asset('assets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  </script>
@endsection