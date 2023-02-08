
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 20px; }
</style>
        <div class="an-single-component with-shadow">
            <div class="an-component-header">
              <h6>{{ 'Cotizaciones' }}</h6>
              <div>
                  <div class="col-md-12">
                      <em>Activa el interruptor para que el apartado se muestre al crear la cotizacion</em>
                  </div>
              </div>
              <div class="component-header-right">
                <div class="btn-space">
                    
                </div>
              </div>
            </div>
            <div class="an-component-body padding20">
                <div class="row">
                    <div class="col-md-6">
                        @foreach(json_decode($cotc) as $cot)
                        <div id="tree-cot-c">
                            <ul>
                                @php
                                    $cotizacion = $cot[0]->name;
                                    if($cot[0]->status){
                                        if(strrpos($cotizacion, 'Parent', -1)) {
                                @endphp
                                <li><input type="hidden" name="{{ $cot[0]->name }}"><span>Cotizaciones Venta</span>
                                    <ul>
                                        @foreach($cot[0]->children as $cotChildren)
                                            @php
                                                if($cotChildren[0]->name == "notascomerciales"){
                                            @endphp
                                                <li>
                                                    <input name="{{ $cotChildren[0]->name }}" type="checkbox" disabled checked data-size="mini" data-toggle="toggle" data-style="ios" data-on=" " data-off=" " ><span class="disabled">{{ $cotChildren[0]->name }}</span>
                                                </li>
                                            @php
                                                }else{
                                            @endphp    
                                                <li>
                                                    <input name="{{ $cotChildren[0]->name }}" type="checkbox" @php if($cotChildren[0]->status){ echo 'checked';}  @endphp data-size="mini" data-toggle="toggle" data-style="ios" data-on=" " data-off=" " ><span>{{ $cotChildren[0]->name }}</span>
                                                </li>
                                            @php
                                                }
                                            @endphp
                                        @endforeach
                                    </ul>
                                </li>
                                @php 
                                        } else {
                                @endphp
                                        
                                @php 
                                        }
                                    }
                                @endphp
                            </ul>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="an-btn an-btn-success previewbtn" data-id="1" data-toggle="modal" data-target="#addNotas">Vista previa</button>
                                <button id="save-cot-c" data-id='' type="button" class="an-btn an-btn-success">{{ 'Guardar' }}</button>
                            </div>
                        </div>  
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <div id="tree-cot-r">
                            <ul>
                            @foreach(json_decode($cotr) as $cot)
                                @php
                                    $cotizacion = $cot[0]->name;
                                    if($cot[0]->status){
                                        if(strrpos($cotizacion, 'Parent', -1)) {
                                @endphp
                                <li><input type="hidden" name="{{ $cot[0]->name }}"><span>Cotizaciones Renta</span>
                                    <ul>
                                        @foreach($cot[0]->children as $cotChildren)
                                            @php
                                                if($cotChildren[0]->name == "notascomerciales"){
                                            @endphp
                                                <li>
                                                    <input name="{{ $cotChildren[0]->name }}" type="checkbox" disabled checked data-size="mini" data-toggle="toggle" data-style="ios" data-on=" " data-off=" " ><span class="disabled">{{ $cotChildren[0]->name }}</span>
                                                </li>
                                            @php
                                                }else{
                                            @endphp    
                                                <li>
                                                    <input name="{{ $cotChildren[0]->name }}" type="checkbox" @php if($cotChildren[0]->status){ echo 'checked';}  @endphp data-size="mini" data-toggle="toggle" data-style="ios" data-on=" " data-off=" " ><span>{{ $cotChildren[0]->name }}</span>
                                                </li>
                                            @php
                                                }
                                            @endphp
                                        @endforeach
                                    </ul>
                                </li>
                                @php 
                                        } else {
                                @endphp
                                        
                                @php 
                                        }
                                    }
                                @endphp
                            @endforeach
                            </ul>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="an-btn an-btn-success previewbtn" data-id="2" data-toggle="modal" data-target="#addNotas">Vista previa</button>
                                <button id="save-cot-r" data-id='0' type="button" class="an-btn an-btn-success">{{ 'Guardar' }}</button>
                            </div>
                        </div>  
                    </div>
                </div>
              <!--<div class="row">
                  <div class="col-md-6">
                    <span id="">Especificaciones</span>  
                  </div>
                  <div class="col-md-6">
                      <input type="checkbox" checked data-toggle="toggle" data-style="ios" data-on="Habilitado" data-off="Deshabilitado" id="especificaciones">
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-6">
                    <span id="">Notas Comerciales</span>    
                  </div>
                  <div class="col-md-6">
                     <input type="checkbox" checked data-toggle="toggle" data-style="ios" data-on="Habilitado" data-off="Deshabilitado" id="notas"> 
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-6">
                      <span id="">Cuenta de Pago</span>  
                  </div>
                  <div class="col-md-6">
                      <input type="checkbox" checked data-toggle="toggle" data-style="ios" data-on="Habilitado" data-off="Deshabilitado" id="cuentapago">
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-6">
                      <span id="">Informacion de entrega</span>  
                  </div>
                  <div class="col-md-6">
                      <input type="checkbox" checked data-toggle="toggle" data-style="ios" data-on="Habilitado" data-off="Deshabilitado" id="infoentrega">
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-6">
                      <span id="">Comentarios</span>  
                  </div>
                  <div class="col-md-6">
                      <input type="checkbox" checked data-toggle="toggle" data-style="ios" data-on="Habilitado" data-off="Deshabilitado" id="comentarios">
                  </div>
              </div>-->
            </div> 
          </div> 


          <!-- Agregar nuevo registro -->
          <div class="modal fade primary" id="addNotas" tabindex="-1" role="dialog" aria-labelledby="addNotas">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 id="myModalLabel">{{ 'Vista previa de la ventana "Nueva cotizacion" ' }}</h4>
                  </div>
                  <div class="modal-body">
                    <div class="" style="background-color:#f7f7f7;border-radius:25px;border:2px solid #c4c4c4;">
                        <div class="an-helper-block">
                            @include('theme.widgets.newCoti-preview')
                        </div>
                    </div>
                    <!--<p>
                      <form class="an-form" action="#">
                          
                          <p class="an-small-doc-blcok">Complete el siguiente formulario para poder agregar una nueva Nota comercial</p>

                          <label for="nomComercial">Nombre de la Nota comercial: </label>
                          <div class="an-input-group">
                              <div class="an-input-group-addon"><i class="ion-ios-note-outline"></i></div>
                              <input id="nomComercial" type="text" class="an-form-control"  placeholder="Nombre de la Nota comercial">
                          </div>

                          <div class="an-input-group">
                            <label for="condiciones">Estatus: </label>
                            <span class="an-custom-radiobox danger">
                              <input type="radio" name="status" id="status-1" checked="true" value="true">
                              <label for="radio-1">{{ 'Activo' }}</label>
                            </span>
                            <span class="an-custom-radiobox danger">
                              <input type="radio" name="status" id="status-2" value="false">
                              <label for="status-2">{{ 'Inactivo' }}</label>
                            </span>
                          </div>
                          <br>
                          <div class="an-input-group">
                            <label for="condiciones">Condiciones:</label>
                            <textarea id="condiciones" class="an-form-control" placeholder="Condiciones ..."></textarea>
                          </div>
                      </form>
                    </p>-->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="an-btn an-btn-danger" data-dismiss="modal">{{ 'Cancelar' }}</button>
                    <button id="save-note" type="button" class="an-btn an-btn-success">{{ 'Guardar' }}</button>
                  </div>
              </div>
            </div>
          </div>


@section('scripts')

<!--

  * Cualquier cosa que escribas en esta parte va a aparecer despues de los scripts 
  *

-->

  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>

<!-- SCRIPTS FOR SECTION -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script type="text/javascript">
    
    var cotsConfig = new Array();
    
    @foreach(json_decode($cots) as $cot)         
        cotsConfig[{{ $cot->id }}] = JSON.parse('{!! json_decode($cot->dataConfig) !!}');
    @endforeach
    
    $(document).ready(function(){
        
        treec = $('#tree-cot-c').tree({
          dnd: false,
          checkAll: true
        });
        
        treer = $('#tree-cot-r').tree({
          dnd: false,
          checkAll: true
        });
        
        /***********
         * Salvar Cotizacion Venta
        ***********/
        $("#save-cot-c").click(function(){
            var jsonCotc = [];
            //Busca el elemento con id tree-cot-c despues detro del ul y dentro de li
            $("#tree-cot-c > ul > li").each(function(i, obj){
                var jsonChildC = [];
                //Busca a partir de la ubicacion de obj(tree-cot-c/ul/li) y despues detro del ul y dentro de li
                $(obj).find("ul > li > div > input").each(function(x, objx){
                    jsonChildC.push([{
                        name: $(objx).attr("name"),
                        status: $(objx).is(':checked')    
                    }]);
                });
                
                jsonCotc.push([{
                    name: $(obj).find('> input').attr("name"),
                    status: true,
                    children: jsonChildC
                }]);
            });
            console.log(jsonCotc);
            
            $.ajax({
                url: "{{ URL::route('setCotC') }}",
                type: 'post',
                    data: {
                    id : 1,
                    dataConfig: JSON.stringify(jsonCotc)
                }, 
                success: function(){
                    console.log("cotizacion guardada normal")
                }
            });
        });
        
        /***********
         * Salvar Cotizacion Renta
        ***********/
        $("#save-cot-r").click(function(){
            var jsonRole = [];
        
            $("#tree-cot-r > ul > li").each(function(i, obj){
                var jsonChild = [];
                
                $(obj).find("ul > li > div > input").each(function(x, objx){
                    jsonChild.push([{
                        name: $(objx).attr("name"),
                        status: $(objx).is(':checked')    
                    }]);
                });
                
                jsonRole.push([{
                    name: $(obj).find('> input').attr("name"),
                    status: true,
                    children: jsonChild
                }]);
            });
            console.log(jsonRole);
            
            $.ajax({
                url: "{{ URL::route('setCotR') }}",
                type: 'post',
                    data: {
                    id : 2,
                    dataConfig: JSON.stringify(jsonRole)
                }, 
                success: function(){
                    console.log("cotizacion guardada renta")
                }
            });
        });
        
        //Al abrir el modal se ejecuta la configuracion guardada
        //$("#addNotas").on("shown.bs.modal", function(e){
            
        $(".previewbtn").click(function(){
             
            $.ajax({
                url: "{{ URL::route('getCotConfig') }}",
                type: 'post',
                data: {
                    id : $(this).attr('data-id')
                }, 
                success: function(result){
                    //obtiene el arreglo json cotc
                    var cotc = JSON.parse(result.cots);
                    
                    //para utilizar parent como objeto json
                    var parent = cotc[0];
                    
                    //
                    console.log(parent[0].children);
                    //                          posicion de arreglo, propiedad
                    $.each( parent[0].children, function( key, value ) {
                        
                        //alert( key + ": " + value[0].name + " : " + value[0].status );
                        
                        if(value[0].status == false){
                            $("#" + value[0].name + "div").hide();    
                        }
                        else{
                            $("#" + value[0].name + "div").show();
                        }
                    });
                    
                }
            });
            
        });
        
        
    });

  </script>

@endsection