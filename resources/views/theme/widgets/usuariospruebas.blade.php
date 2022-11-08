<div class="row">

  <div class="col-md-5">
        <div class="an-single-component with-shadow">
          <div class="an-component-header">
            <h6>Roles</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">
              <table id="rolesTable">
                <thead>
                  <tr>
                    <th>Clave</th>
                    <th>Rol</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($roles as $rol)
                  <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{ $rol->rol }}</td>
                    <td><button id="role{{ $rol->id }}" class="btnRol" data-id="{{ $rol->id }}" data-toggle="modal" data-target="#editRole"> <i class="ion-plus-round"></i> Editar</button></td>
                  </tr>
                  @endforeach                                                     
                </tbody>
              </table>
            </div>
          </div>
        </div>    
  </div>
    
</div>

<div class="row">
    <div class="an-single-component with-shadow">
        <div class="an-component-header">
            <h6>Usuarios</h6>
            <div class="component-header-right">
              <form class="an-form" action="#">
              </form>
              <div class="an-default-select-wrapper">
              </div>
              <div id="div-add" class="btn-space">
                    <button id="create-btn" class="an-btn an-btn-success block-icon" data-toggle="modal" data-target="#add"> <i class="ion-plus-round"></i>Agregar</button>
                    <button id="update-btn-trigger" class="an-btn an-btn-success block-icon" data-toggle="modal" data-target="#add" style="display: none;"> <i class="ion-plus-round"></i>Agregar</button>
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
                            <table id="usuariosTable"></table>
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
<!-- Editar roles de usuario -->
<div class="modal fade primary" id="editRole" tabindex="-1" role="dialog" aria-labelledby="editRole">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 id="myModalLabel">{{ 'Editar rol de Usuario' }}</h4>
        </div>
        <div class="modal-body">

        <div id="tree-rol">
            <ul>
                <li><input name="cotizacionesParent" type="checkbox"><span>Cotizaciones</span>
                    <ul>
                        <li><input name="nueva-cotizacion" type="checkbox"><span>Nueva cotización</span></li>
                        <li><input name="buscar-cotizacion" type="checkbox"><span>Buscar cotizaciones</span></li>
                        <li><input name="alta-cliente" type="checkbox"><span>Alta cliente</span></li>
                        <li><input name="articulos" type="checkbox"><span>Ver Artículos</span></li>
                        <li><input name="nuevo-articulo" type="checkbox"><span>Nuevo artículo</span></li>
                        <li><input name="refrencias-cruzadas" type="checkbox"><span>Referencias cruzadas</span></li>
                        @if(session('domain') == 'gruposim.com')
                        <li><input name="maxdesc" type="text" class="form-control-sm"><span>% Descuento max</span></li>
                        @endif
                    </ul>
                </li>
                <li><input name="buscar-pedido" type="checkbox"><span>Pedidos</span></li>
                <li><input name="entregasParent" type="checkbox"><span>Entregas</span></li>
                    <ul>
                      <li><input name="buscar-entrega" type="checkbox"><span>Buscar Entregas</span></li>
                      <li><input name="showCrearHE" type="checkbox"><span>Registrar Entregas</span></li>
                    </ul>
                <li><input name="buscar-facturas" type="checkbox"><span>Facturas</span></li>
                <li><input name="monitor-avance" type="checkbox"><span>Monitor de avance</span></li>
                <li><input name="reportesParent" type="checkbox"><span>Reportes</span>
                    <ul>
                        <li><input name="antiguedad-saldo" type="checkbox"><span>Antiguedad de saldos</span></li>
                        <li><input name="estados-cuenta" type="checkbox"><span>Estados de cuenta</span></li>
                        <li><input name="commissions" type="checkbox"><span>Comisiones</span></li>
                    </ul>
                </li>                
                <li><input name="solicitudesParent" type="checkbox"><span>Solicitudes</span>
                    <ul>
                        <li><input name="scliente" type="checkbox"><span>Alta cliente SAP</span></li>
                        <li><input name="scredito" type="checkbox"><span>Solicitud de crédito</span></li>
                    </ul>
                </li>
                <li><input name="biblioteca" type="checkbox"><span>Biblioteca</span></li>
                <li><input name="administracionParent" type="checkbox"><span>Adminitración</span>
                    <ul>
                        <li><input name="general" type="checkbox"><span>General</span></li>
                        <li><input name="herramientas.index" type="checkbox"><span>Herramientas</span></li>
                        <li><input name="usuarios" type="checkbox"><span>Usuarios</span></li>
                        <li><input name="capacitacion" type="checkbox"><span>Capacitación</span></li>
                        <li><input name="slider" type="checkbox"><span>Slider</span></li>
                        <li><input name="policy" type="checkbox"><span>Pólizas</span></li>
                        <li><input name="specs" type="checkbox"><span>Especificaciones</span></li>
                        <li><input name="customisation" type="checkbox"><span>Personalización</span></li>
                    </ul>
                </li>                 
            </ul>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="an-btn an-btn-danger" data-dismiss="modal">{{ 'Cancelar' }}</button>
          <button id="save-role" data-id='0' type="button" class="an-btn an-btn-success">{{ 'Guardar' }}</button>
        </div>
    </div>
  </div>
</div>

<!-- Agregar nuevo usuario -->

<div class="modal fade primary" id="add" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 style="display: none;" id="add-label">{{ 'Agregar Usuario' }}</h4>
            <h4 style="display: none;" id="update-label">{{ 'Actualizar Usuario' }}</h4>
          </div>
          <div class="modal-body">
            <p class="an-small-doc-blcok" id="create-instr">Complete el siguiente formulario para poder agregar una nuevo usuario</p>
            <p class="an-small-doc-blcok" id="update-instr">Modifica los campos que consideres necesarios</p>
            <div id="row-id">
              <label for="id">ID: </label>
              <div class="row" id="row-component">
                <div class="col-md-4">
                  <div class="an-input-group">
                    <div class="an-input-group-addon"><i class="ion-pound"></i></div>
                    <input id="id" type="text" class="an-form-control text-center" placeholder="ID" data-toggle="tooltip" title="Hello" value="" disabled="disabled" />
                  </div>
                </div>
              </div>
            </div>
            <label for="name">Nombre: </label>
            <div class="an-input-group">
              <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
              <input id="name" type="text" class="an-form-control not-null" placeholder="Nombre" data-toggle="tooltip" title="Nombre" />
            </div>
            <label for="email">Email: </label>
            <div class="an-input-group">
              <div class="an-input-group-addon" id="desc-icon"><i class=""></i></div>
              <input id="email" type="text" class="an-form-control not-null" placeholder="Correo" data-toggle="tooltip" title="Correo" />
            </div>
            <div id="passworddiv">
                <label for="pass">Password: </label>
                <div class="an-input-group">
                  <div class="an-input-group-addon" id="desc-icon"><i class=""></i></div>
                  <input id="pass" type="password" class="an-form-control not-null" placeholder="password" data-toggle="tooltip" title="Correo" />
                </div>
            </div>
            <label for="uadmin">Rol: </label>
            <div class="an-input-group">
              <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
              <input id="uadmin" type="text" class="an-form-control not null" placeholder="Rol" data-toggle="tooltip" title="Rol" />
            </div>
            <div class="updateformulario" id="updateformulario">
              <div class="row">
                  <div class="col-md-6">
                    <label for="slpcode">SlpCode <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="slpcode" type="text" class="an-form-control" placeholder="slpcode" data-toggle="tooltip" title="SlpCode" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="commission">Commission: <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="commission" type="text" class="an-form-control" placeholder="Commission" data-toggle="tooltip" title="Commission" />
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <label for="groupcode">GroupCode <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="groupcode" type="text" class="an-form-control" placeholder="Group Code" data-toggle="tooltip" title="GroupCode" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="locked">Locked <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="locked" type="text" class="an-form-control" placeholder="Locked" data-toggle="tooltip" title="Locked" />
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <label for="datasource">DataSource <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="datasource" type="text" class="an-form-control" placeholder="DataSource" data-toggle="tooltip" title="DataSource" />
                    </div>
                  </div>
                  <div class="col-md-6">
                     <label for="usersign">UserSign <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="usersign" type="text" class="an-form-control" placeholder="UserSign" data-toggle="tooltip" title="DataSource" />
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <label for="empid">EmpID <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="empid" type="text" class="an-form-control" placeholder="EmpID" data-toggle="tooltip" title="EmpID" />
                    </div>
                  </div>
                  <div class="col-md-6">
                     <label for="active">Active :</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="active" type="text" class="an-form-control" placeholder="Active" data-toggle="tooltip" title="Active" />
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <label for="telephone">Telephone <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="telephone" type="text" class="an-form-control" placeholder="Telephone" data-toggle="tooltip" title="Telephone" />
                    </div>
                  </div>
                  <div class="col-md-6">
                     <label for="mobil">Mobil <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="mobil" type="text" class="an-form-control" placeholder="Mobil" data-toggle="tooltip" title="Mobil" />
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <label for="ubranch">U_branch <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="ubranch" type="text" class="an-form-control" placeholder="U_branch" data-toggle="tooltip" title="U_branch" />
                    </div>
                  </div>
                  <div class="col-md-6">
                     <label for="usalt">U_salt <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="usalt" type="text" class="an-form-control" placeholder="U_salt" data-toggle="tooltip" title="U_salt" />
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <label for="upricelist">U_pricelist <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="upricelist" type="text" class="an-form-control" placeholder="U_pricelist" data-toggle="tooltip" title="U_pricelist" />
                    </div>
                  </div>
                  <div class="col-md-6">
                     <label for="umanager">U_manager <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="umanager" type="text" class="an-form-control" placeholder="U_manager" data-toggle="tooltip" title="U_manager" />
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <label for="uexport">U_export <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="uexport" type="text" class="an-form-control" placeholder="U_export" data-toggle="tooltip" title="U_export" />
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                     <label for="udiscounts">U_discounts <small id="small-price">(opcional)</small>:</label>
                    <div class="an-input-group">
                        <div class="an-input-group-addon" id="title-icon"><i class=""></i></div>
                        <input id="udiscounts" type="text" class="an-form-control" placeholder="U_discounts" data-toggle="tooltip" title="U_discounts" />
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="an-btn an-btn-danger" id="close" data-dismiss="modal">{{ 'Cancelar' }}</button>
            <button type="button" class="an-btn an-btn-success" id="action-btn"><span>{{ 'Guardar' }}</span>
              <img id="ajax-loader" src="{{ asset('assets/img/loading.gif') }}" height="20" style="display: none;"/></button>
          </div>
      </div>
    </div>
  </div>

@section('scripts')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


<script src="{{ asset('assets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    var route = "{{Request::url()}}";
    var edit_img_route = "{{asset('assets/img/edit.png')}}";
    var delete_img_route = "{{asset('assets/img/delete.png')}}";
    var ajax_loader_route = "{{ asset('assets/img/loading.gif') }}";
  </script>
  <script src="{{ asset('assets/js/users.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/validation.js') }}" type="text/javascript"></script>

<script type="text/javascript">


  var rolesConfig = new Array();
  

  @foreach($roles as $rol)         
    
    rolesConfig[{{ $rol->id }}] = JSON.parse('{!! json_decode($rol->dataConfig) !!}');
  @endforeach


  var tree;

  $(document).ready(function(){

    var roles = $("#rolesTable").DataTable();
   // var usuarios = $("#usuariosTable").DataTable();

    //scriptdejo de funcionar 2/10/2020 11:31 am
    /*tree = $('#tree-rol').tree({
      dnd: false,
      checkAll: true
    });*/


    /*********
    Crear Rol
    **********/

    $("#save-role").click(function(){

        var jsonRole = [];
    
        $("#tree-rol > ul > li").each(function(i, obj){
          
          var jsonChild = [];
    
          $(obj).find("ul > li > input").each(function(x, objx){
          
            jsonChild.push([{
              name: $(objx).attr("name"),
              status: $(objx).is(':checked')
            }]);
    
          });
    
          jsonRole.push([{
            name: $(obj).find('> input').attr("name"),
            status: $(obj).find('> input').is(':checked'),
            children: jsonChild
          }]);
    
        });

        $.ajax({
          url: "{{ URL::route('setRol') }}",
          type: 'post',
          data: {
            id : $("#save-role").attr('data-id'),
            dataConfig: JSON.stringify(jsonRole),
            maxdesc : $("#tree-rol input[name='maxdesc']").val()
          }, 
          success: function(){
            location.reload();
          }
        });

        console.log(jsonRole);

   });


    /***************
      Actualizar Rol
    ****************/

    $(".btnRol").click(function(){
      
      console.log(rolesConfig);
      var dataId = $(this).attr('data-id');
      
      $("#save-role").attr('data-id', dataId);
      
      $("#tree-rol input[type='checkbox']").prop('checked', false);
      $.each(rolesConfig[dataId], function(i, obj){

        if(obj[0].status){
          $("#tree-rol input[name='" + obj[0].name + "']").prop('checked', true);
        } 

        $.each(obj[0].children, function(ix, objx){
          
          if(objx[0].status){
            $("#tree-rol input[name='" + objx[0].name + "']").prop('checked', true);
          }
        });

      });
      $.ajax({
          url: "{{ URL::route('getRol') }}",
          type: 'post',
          data: {
            id : $("#save-role").attr('data-id')
          }, 
          success: function(result){
            $("#tree-rol input[name='maxdesc']").val(result.maxdesc);
          }
        });

    });

  });

</script>

@endsection