<div class="row">
    <div class="an-single-component with-shadow">
        <div class="an-component-header">
            <h6>Hojas de entrega</h6>
            <div class="component-header-right">
                <form class="an-form" action="#">
                </form>
                <div class="an-default-select-wrapper">
                </div>
                <div id="div-add" class="btn-space">
                    <button id="create-btn" class="an-btn an-btn-success block-icon" data-toggle="modal"
                        data-target="#add"> <i class="ion-plus-round"></i>Agregar</button>
                    <button id="update-btn-trigger" class="an-btn an-btn-success block-icon" data-toggle="modal"
                        data-target="#add" style="display: none;"> <i class="ion-plus-round"></i>Agregar</button>
                </div>
            </div>
        </div>
        <div class="an-component-body">
            <div class="an-helper-block">
                <div class="row">
                    <div class="col-md-12">
                        <div style='padding: 20px;'>
                            <div id="container" style="display:none;">
                                <!-- ver assets/js/users.js para llenado de tabla-->
                                <table id="hojasETable"></table>
                            </div>

                            <div class="row text-center" id="data-loader">
                                <img src="{{ asset('assets/img/loading3.gif') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('assets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    var route = "{{Request::url()}}";
    var edit_img_route = "{{asset('assets/img/edit.png')}}";
    var delete_img_route = "{{asset('assets/img/delete.png')}}";
    var ajax_loader_route = "{{ asset('assets/img/loading.gif') }}";
  </script>
  <script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>
