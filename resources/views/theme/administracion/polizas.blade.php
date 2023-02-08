@extends('theme.body')

@section('company', 'Alianza Electrica')

@section('custom-styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <style type="text/css">
    table tr td img{
      cursor: pointer;
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
              <li class="active">Pólizas</li>
            </ol>
          </div> <!-- end AN-BREADCRUMB -->

          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>Pólizas</h2>
            </div>
          </div> <!-- end AN-BODY-TOPBAR -->
          @include('theme.widgets.policies-fragment')

        </div>
      </div>

      @include('theme.widgets.footer')
    </div> 

@endsection

@section('scripts')
  <script src="{{ asset('assets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    var route = "{{Request::url()}}";
    var edit_img_route = "{{asset('assets/img/edit.png')}}";
    var delete_img_route = "{{asset('assets/img/delete.png')}}";
    var ajax_loader_route = "{{ asset('assets/img/loading.gif') }}";
  </script>
  <script src="{{ asset('assets/js/policy.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>
@endsection
