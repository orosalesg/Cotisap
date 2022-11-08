<div class="row">
  <div class="col-md-3">
       <div class="an-single-component with-shadow">
          <div class="an-component-header">
            <h6>{{ 'Datos del cliente' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">
              
              <label for="clienteCodigo">{{ 'Código/Nombre del cliente' }}: 
                <img id="clienteLg" hidden="hidden" height="18" src="{{ asset('assets/img/loading.gif') }}" style="display: none;">
              </label>
              <div class="an-input-group">
                <select class="an-form-control" id="clienteCodigo" name="clienteCodigo" >
                </select>
              </div>
              <br>
              <label for="CardName2">{{ 'Nombre del cliente' }}: </label>
              <div class="an-input-group" >
                <div class="an-input-group-addon"><i></i></div>
                <input type="text" id="CardName2" class="an-form-control CardName" name="CardName2" data-toggle="tooltip" data-placement="top" title="{{ 'Nombre del cliente' }}" readonly >
              </div>
              <div class="row">
                <div class="col-md-12">
                  <a href="#" data-toggle="detalleCliente" >{{ 'M&aacute;s informaci&oacute;n del cliente' }}</a> 
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  <div class="col-md-9">
        <div class="an-single-component with-shadow">
          <div class="an-component-header">
            <h6>{{ 'Informaci&oacute;n de cr&eacute;dito' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">
            <div class="row">
              
            
              <div class="col-md-3">
                <label for="cotiLimite">{{ 'Limite de cr&eacute;dito' }} (MXN)</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cotiLimite" class="an-form-control dinero" name="cotiLimite" readonly="true">
                </div>           
              </div>

              <div class="col-md-3">
                <label for="cotiDeudor">{{ 'Saldo deudor' }} (MXN)</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cotiDeudor" class="an-form-control dinero" name="cotiDeudor" readonly="true">
                </div>
              </div>

              <div class="col-md-3">
                <label for="cotiDisp">{{ 'Cr&eacute;dito disponible'  }} (MXN)</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cotiDisp" class="an-form-control dinero" name="cotiDisp" readonly="true">
                </div>
              </div>

              <div class="col-md-3">
                <label for="cotiDias">{{ 'D&iacute;as de cr&eacute;dito' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cotiDias" class="an-form-control" name="cotiDias" readonly="true">
                </div>
              </div>

              <div class="col-md-3">
                <label for="DocDate">{{ 'Fecha &uacute;ltimo pago' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="DocDate" class="an-form-control" name="DocDate" readonly="true">
                </div>
              </div>

              <div class="col-md-3">
                <label for="cotiMonto">{{ 'Monto &uacute;ltimo pago' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cotiMonto" class="an-form-control dinero" name="cotiMonto" readonly="true">
                </div>
              </div>

</div>
            </div>
          </div>
        </div>    
  </div>
</div>

<div class="col-md-12">
     <div class="an-single-component with-shadow">

<!--
  ______                          _                                _                 _            _             _   _         _           
 |  ____|                        | |                              | |               | |          | |           | | (_)       | |          
 | |__     _ __     ___    __ _  | |__     ___   ____   __ _    __| |   ___       __| |   ___    | |   __ _    | |  _   ___  | |_    __ _ 
 |  __|   | '_ \   / __|  / _` | | '_ \   / _ \ |_  /  / _` |  / _` |  / _ \     / _` |  / _ \   | |  / _` |   | | | | / __| | __|  / _` |
 | |____  | | | | | (__  | (_| | | |_) | |  __/  / /  | (_| | | (_| | | (_) |   | (_| | |  __/   | | | (_| |   | | | | \__ \ | |_  | (_| |
 |______| |_| |_|  \___|  \__,_| |_.__/   \___| /___|  \__,_|  \__,_|  \___/     \__,_|  \___|   |_|  \__,_|   |_| |_| |___/  \__|  \__,_|
-->                                                                                                                                          
                                                                                                                                   

        <div class="an-component-header">     
          <div class="col-md-3">
           <h6>{{ 'Productos a cotizar' }}</h6> 
          </div>
          <div class="col-md-4">
              <div class="col-md-6 text-right">
                <span> {{ 'Tipo de Cambio' }} :</span>
              </div>
              <div class="col-md-6"> 
                <input type="text" id="tipodecambio" class="tipodecambio an-form-control" value="0.00">
              </div>
          </div>
          <div class="col-md-5">
            <div class="an-input-group">
              <div class="col-md-8 text-right">
                <span> {{ 'Selecciona moneda' }} :</span>
              </div>
              <div class="col-md-4"> 
                <select id="modenaGeneral" class="an-form-control">
                </select>
              </div>
            </div>            
          </div>
        </div>


<!--
  _        _         _                   _                                       _                  _                 
 | |      (_)       | |                 | |                                     | |                | |                
 | |       _   ___  | |_    __ _      __| |   ___     _ __    _ __    ___     __| |  _   _    ___  | |_    ___    ___ 
 | |      | | / __| | __|  / _` |    / _` |  / _ \   | '_ \  | '__|  / _ \   / _` | | | | |  / __| | __|  / _ \  / __|
 | |____  | | \__ \ | |_  | (_| |   | (_| | |  __/   | |_) | | |    | (_) | | (_| | | |_| | | (__  | |_  | (_) | \__ \
 |______| |_| |___/  \__|  \__,_|    \__,_|  \___|   | .__/  |_|     \___/   \__,_|  \__,_|  \___|  \__|  \___/  |___/
                                                     | |                                                              
                                                     |_|                                                              
-->

        <div class="an-component-body">
          <div class="an-helper-block">

            <div class="row menu-product">
              <div class="col-md-5">
                <span>{{ '# Art&iacute;culo *' }}<br><br></span>
              </div>
              <div class="col-md-1 ">
                <span>{{ 'P. Lista *' }}<br></span>
              </div>
              <div class="col-md-1 ">
                <span>{{ 'Moneda *' }}<br></span>
              </div>
              
              <div class="col-md-1 ">
                <span>{{ 'P.Venta' }}<br></span>
              </div>
              <div class="col-md-1 ">
                <span>{{ 'Cantidad *' }}<br></span>
              </div>
              <div class="col-md-1 ">
                <span>{{ 'IVA' }}<br></span>
              </div>
              <div class="col-md-1 ">
                <span>{{ 'Importe' }}<br></span>
              </div>                                                                      
            </div>

            <div id="contenerdor-products"></div>
           
            <div class="row">
                
              <div class="col-md-12 text-right">
                <button id="createProduct" class="an-btn an-btn-success block-icon disabled"> <i class="ion-plus-round"></i>Agregar artículo</button>
              </div>

            </div>

          </div>
        </div>

        <div class="an-component-footer">
          <div class="row">
            <div class="col-md-12 text-right">
              <span><a href="" class="btn btn-success btn-no-sap">Agregar productos (No SAP) </a></span>
              <br>
            </div>
          </div> 
        </div>

     </div>
</div>


<div class="row">
  <div class="col-md-6" id="especificacionesdiv">

      <div class="an-single-component with-shadow totales">
          <div class="an-component-header">
            <h6>{{ 'Especificaciones' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">

              <div class="row">
                <div class="col-md-12">
                    <select name="speci" id="speci" class="an-form-control" multiple>
                    </select>
                </div>
              </div>
            </div>
          </div>
        </div>  
  

  </div>
  <div class="col-md-2"></div>
  <div class="col-md-4">       
       <div class="an-single-component with-shadow totales">
          <div class="an-component-header">
            <h6>{{ 'Total de la cotizaci&oacute;n' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">

              <div class="row">
                <div class="col-md-8">
                  <span>{{ 'Total' }}:</span>
                </div>
                <div class="col-md-4">
                  <span id="totalCoti">NaN</span><i class="moneda"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6" id="notascomercialesdiv">       
       <div class="an-single-component with-shadow">
          <div class="an-component-header">
            <h6>{{ 'Notas comerciales *' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">
             <select id="notes" class="an-form-control">
             </select>
             <p id="notas-condiciones"></p>
            </div>
          </div>
        </div>
  </div>
  <div class="col-md-6" id="cuentapagodiv">       
       <div class="an-single-component with-shadow">
          <div class="an-component-header">
            <h6>{{ 'Cuenta de pago *' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">
                <select id="accounts" class="an-form-control">
                </select>
            </div>
          </div>
        </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6" id="informacionentregadiv">       
       <div class="an-single-component with-shadow">
          <div class="an-component-header">
            <h6>{{ 'Información de entrega' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">
              <div class="row">
                <div class="col-md-12">
                  <select id="tipo-entrega" name="tipo-entrega" class="an-form-control">
                    <option value=""></option>
                    <option value="1">{{ 'Recoge en sucursal' }}</option>
                    <option value="2">{{ 'Entrega en oficina' }}</option>
                    <option value="3">{{ 'Entrega en obra' }}</option>
                    <option value="4">{{ 'Ocurre' }}</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <p>&nbsp;</p>
              </div>
              <div class="row form-entrega">
                <div class="col-md-6">
                  <label for="cotiEntregaPersona">{{ 'Persona que recibe' }}</label>
                  <div class="an-input-group">
                    <div class="an-input-group-addon"><i></i></div>
                    <input type="text" id="cotiEntregaPersona" class="an-form-control" name="cotiEntregaPersona">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="cotiEntregaDireccion">{{ 'Direcci&oacute;n de entrega' }}</label>
                  <div class="an-input-group">
                    <div class="an-input-group-addon"><i></i></div>
                    <input type="text" id="cotiEntregaDireccion" class="an-form-control" name="cotiEntregaDireccion">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="cotiEntregaTele">{{ 'Tel&eacute;fono de contacto' }}</label>
                  <div class="an-input-group">
                    <div class="an-input-group-addon"><i></i></div>
                    <input type="text" id="cotiEntregaTele" class="an-form-control" name="cotiEntregaTele" >
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="cotiEntregaEmail">{{ 'E-mail de contacto' }}</label>
                  <div class="an-input-group">
                    <div class="an-input-group-addon"><i></i></div>
                    <input type="text" id="cotiEntregaEmail" class="an-form-control" name="cotiEntregaEmail" >
                  </div>
                </div>
                <div class="col-md-6 cotiEntregaFletera">
                  <label for="cotiEntregaFletera">{{ 'Fletera' }}</label>
                  <div class="an-input-group">
                    <div class="an-input-group-addon"><i></i></div>
                    <input type="text" id="cotiEntregaFletera" class="an-form-control" name="cotiEntregaFletera" >
                  </div>
                </div>                                                                                              
              </div>

            </div>
          </div>
        </div>
  </div>
  <div class="col-md-6" id="comentariosdiv">       
       <div class="an-single-component with-shadow">
          <div class="an-component-header">
            <h6>{{ 'Comentarios' }}</h6>
          </div>
          <div class="an-component-body">
            <div class="an-helper-block">
              <div class="an-input-group">
                <label for="Comentarios">Comentarios:</label>
                <div class="an-input-group">
                  <textarea id="Comentarios" class="an-form-control" placeholder="Comentarios ..."></textarea>  
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="an-single-component">
     <div class="an-component-body">
        <div class="an-helper-block">
          <div class="row">
            <div class="col-md-12 text-center">
              <input type="submit" id="cancel" class="btn an-btn-danger" name="cancel" value="Cancelar">
              <input type="submit" id="success" class="btn an-btn-primary" name="success" value="Finalizar cotización">
              <img id="cotizacionLg" hidden="hidden" height="18" src="http://localhost:8000/assets/img/loading.gif" style="display: none;">
            </div>            
          </div>
        </div>
      </div>     
    </div>
  </div>
</div>

<!--
  ______   _                                     _                                            _   _                 
 |  ____| | |                                   | |                                          | | | |                
 | |__    | |   ___   _ __ ___     ___   _ __   | |_    ___    ___      ___     ___   _   _  | | | |_    ___    ___ 
 |  __|   | |  / _ \ | '_ ` _ \   / _ \ | '_ \  | __|  / _ \  / __|    / _ \   / __| | | | | | | | __|  / _ \  / __|
 | |____  | | |  __/ | | | | | | |  __/ | | | | | |_  | (_) | \__ \   | (_) | | (__  | |_| | | | | |_  | (_) | \__ \
 |______| |_|  \___| |_| |_| |_|  \___| |_| |_|  \__|  \___/  |___/    \___/   \___|  \__,_| |_|  \__|  \___/  |___/
                                                                                                                    
                                                                                                                    
-->

<div class="d-none">

  <!-- Inicio producto -->
  <div id="product-base">
            <div id="item-product[Element]" class="item-product row">
            <div class="row">  
              <div class="col-md-5">
                <div class="row">
                  <div class="col-md-1">
                    <span class="item-id">{{ 'Element' }}</span>
                  </div>
                  <div class="col-md-4">
                    <div class="an-input-group">
                      <select id="itemCodigo[Element]" name="itemCodigo[Element]" class="itemCodigo an-form-control"></select>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="an-input-group">
                      <input type="text" id="itemName[Element]" name="itemName[Element]" class="itemName an-form-control">
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-2">
                    <div class="an-input-group">
                      <input type="text" id="itemPlista[Element]" name="itemPlista[Element]" class="itemPlista an-form-control dinero">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="an-input-group">
                      <span id="itemMoneda[Element]" name="itemMoneda[Element]" class="itemMoneda ">MONEDA</span>
                    </div>
                  </div>
                  
                  <div class="col-md-2 text-center">
                    <div class="an-input-group">
                      <span id="itemPVenta[Element]" name="itemPVenta[Element]" class="itemPVenta dinero"></span>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="an-input-group">
                      <input type="number" id="itemCantidad[Element]" name="itemCantidad[Element]" class="itemCantidad an-form-control">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="an-input-group">
                      <select id="itemFactor[Element]" name="itemFactor[Element]"  class="itemFactor an-form-control">
                        <option>16</option>
                        <option>0</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 text-right">
                    <div class="an-input-group">
                      <span id="itemImporteS[Element]" name="itemImporteS[Element]" class="itemImporteS"></span><i class="moneda"></i>
                    </div>
                  </div>
                  <div class="col-md-1 itemClose">
                    <span>
                      <i id="itemClose[Element]" class="ion-android-close"></i>
                    </span>
                  </div>
                </div>
              </div> 
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="row">
                  <div class="col-md-1 text-right">
                    <label>UMV: </label>
                  </div>
                  <div class="col-md-2">
                    <div class="an-input-group">
                      <select id="itemUMV[Element]" name="itemUMV[Element]" class="itemUMV an-form-control">
                      </select>
                    </div>                      
                  </div>
                  <div class="col-md-2 text-right">
                    <label>Entrega: </label>
                  </div>
                  <div class="col-md-3">
                    <div class="an-input-group">
                      <input type="text" id="itemEntrega[Element]" name="itemEntrega[Element]" class="itemEntrega an-form-control">
                    </div>                     
                  </div>
                  <div class="col-md-4">
                    <div class="an-input-group">
                      <label>Marca: </label>
                      <span id="itemMarca[Element]" name="itemMarca[Element]" ></span>
                    </div>                     
                  </div>  
                </div>
              </div> 
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-2 text-right">
                    <label>Descuentos a otorgar [%]: </label>                    
                  </div>
                  <div class="col-md-2">
                    <div class="an-input-group">
                      <input type="number" id="itemDesc[Element]" name="itemDesc[Element]" class="itemDesc an-form-control">
                    </div>                    
                  </div>
                  
                  <div class="col-md-3 text-right">
                      <span>Total sin IVA: </span>
                  </div>
                  <div class="col-md-2">
                      <span id="itemPrecioC[Element]"></span>
                    </div>
                  <div class="col-md-3">
                    <div class="an-input-group">
                      <label>Utilidad: </label>
                      <span id="itemUtilidad[Element]" name="itemUtilidad[Element]" class="itemUtilidad"></span>
                    </div>                     
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="row">
                  <div class="col-md-4 text-right">
                    <label>Comentario (250 Max.): </label>
                  </div>
                  <div class="col-md-8">
                    <div class="an-input-group">
                      <input type="text" id="itemComentario[Element]" name="itemComentario[Element]" class="itemComentario an-form-control">
                    </div>                     
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-1 d-none">
                    <span>Descuento otorgado: </span>
                    <span id="itemDescOto[Element]"></span>
                  </div>
                  <div class="col-md-5">
                      <div class="an-input-group">
                          <label>CostoPr: </label>
                        <span id="itemCosto[Element]" name="itemCosto[Element]" class="itemCosto"></span>
                      </div>                     
                    </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-3">
                      <span>Importe Total: </span>
                    <span id="itemImporteT[Element]" class="itemImporteT"><b></b></span><i class="moneda"></i>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
                      <thead>
                          <th>                          
                              <td colspan="10" class="qSubSec" style="color:#3e631a">
                                Existencia por almacén (Total <span id="itemExistenciasAl[Element]">0</span>)
                              </td>                        
                          </th>   
                      </thead>                     
                      <tbody>                        
                                               
                        <tr style="color:#3e631a" id="itemNameExitT[Element]">                                     
                        </tr>                        
                        <tr style="color:#3e631a" id="itemValueExitT[Element]">
                        </tr>                      
                      </tbody>                    
                    </table>
                  </div> 
                  <div class="col-md-6">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">                      
                      <thead>
                          <th>                          
                            <td colspan="10" class="qSubSec" style="color:#a50000">
                                Pendiente por recibir en almacén
                            </td>                        
                          </th> 
                      </thead>
                      <tbody>                        
                                               
                        <tr style="color:#a50000">             
                          <td>QUE</td>
                          <td>DF</td>
                          <td>LEO</td>
                          <td>DFC</td>
                          <td>SAN</td>
                          <td>GUA</td>
                          <td>MON</td>
                          <td>CED</td>
                          <td>CAN</td>
                          <td>AGU</td>                        
                        </tr>                        
                        <tr style="color:#a50000">              
                          <td>
                            <div class="oO1001 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1002 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1003 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1005 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1006 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1007 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1008 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1009 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1011 oTot">
                              <span>0</span>
                            </div>
                          </td>
                          <td>
                            <div class="oO1012 oTot">
                              <span>0</span>
                            </div>
                          </td>                        
                        </tr>                      
                      </tbody>                    
                    </table>
                  </div>
                </div>               
              </div>

            </div>
  </div>
  <!-- Fin producto -->  


   <div class="row" id="cliDetalle"> 

              <div class="col-md-4">
                <label for="CardName">{{ 'Nombre' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="CardName" class="an-form-control CardName" name="CardName" readonly="true">
                </div>           
              </div>

              <div class="col-md-4">
                <label for="CardCode">{{ 'C&oacute;digo' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="CardCode" class="an-form-control" name="CardCode" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="LicTradNum">{{ 'RFC' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="LicTradNum" class="an-form-control" name="LicTradNum" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="Phone1">{{ 'Tel&eacute;fono' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="Phone1" class="an-form-control" name="Phone1" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="E_Mail">{{ 'E-mail' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="E_Mail" class="an-form-control" name="E_Mail" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="IntrntSite">{{ 'Website' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="IntrntSite" class="an-form-control" name="IntrntSite" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="">{{ 'Tipo de persona' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="" class="an-form-control" name="" readonly="true">
                </div>
              </div>

              <div class="col-md-12">
                <h6><b>{{ 'Persona de contacto' }}</b></h6>
              </div>

              <div class="col-md-4">
                <label for="cpName">{{ 'Nombre' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cpName" class="an-form-control" name="cpName" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="cpPhone">{{ 'Tel&eacute;fono' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cpPhone" class="an-form-control" name="cpPhone" readonly="true">
                </div>
              </div>              

              <div class="col-md-4">
                <label for="cpEmail">{{ 'E-mail' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="cpEmail" class="an-form-control" name="cpEmail" readonly="true">
                </div>
              </div>

              <div class="col-md-12">
                <h6><b>{{ 'Direcci&oacute;n fiscal' }}</b></h6>
              </div>

              <div class="col-md-4">
                <label for="fStreet">{{ 'Calle y número' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="fStreet" class="an-form-control" name="fStreet" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="fCol">{{ 'Colonia' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="fCol" class="an-form-control" name="fCol" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="fCity">{{ 'Ciudad' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="fCity" class="an-form-control" name="fCity" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="fCity2">{{ 'Municipio / Delegaci&oacute;n' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="fCity2" class="an-form-control" name="fCity2" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="fState">{{ 'Estado' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="fState" class="an-form-control" name="fState" readonly="true">
                </div>
              </div>        

              <div class="col-md-4">
                <label for="fCountry">{{ 'Pa&iacute;s' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="fCountry" class="an-form-control" name="fCountry" readonly="true">
                </div>
              </div> 

              <div class="col-md-4">
                <label for="fZip">{{ 'C&oacute;digo postal' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="fZip" class="an-form-control" name="fZip" readonly="true">
                </div>
              </div>

              <div class="col-md-12">
                <h6><b>{{ 'Direcci&oacute;n de env&iacute;o' }}</b></h6>
              </div>

              <div class="col-md-4">
                <label for="eStreet">{{ 'Calle y número' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="eStreet" class="an-form-control" name="eStreet" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="eCol">{{ 'Colonia' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="eCol" class="an-form-control" name="eCol" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="eCity">{{ 'Ciudad' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="eCity" class="an-form-control" name="eCity" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="eCity2">{{ 'Municipio / Delegaci&oacute;n' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="eCity2" class="an-form-control" name="eCity2" readonly="true">
                </div>
              </div>

              <div class="col-md-4">
                <label for="eState">{{ 'Estado' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="eState" class="an-form-control" name="eState" readonly="true">
                </div>
              </div>        

              <div class="col-md-4">
                <label for="eCountry">{{ 'Pa&iacute;s' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="eCountry" class="an-form-control" name="eCountry" readonly="true">
                </div>
              </div> 

              <div class="col-md-4">
                <label for="eZip">{{ 'C&oacute;digo postal' }}</label>
                <div class="an-input-group">
                  <div class="an-input-group-addon"><i></i></div>
                  <input type="text" id="eZip" class="an-form-control" name="eZip" readonly="true">
                </div>
              </div>

  </div>

</div>

<!-- Agregar nuevo registro -->
<div class="modal fade primary" id="addCotizacion" tabindex="-1" role="dialog" aria-labelledby="addCotizacion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 id="addCotizacionLabel">{{ 'Nueva cotización creada' }}</h4>
        </div>
        <div class="modal-body">
          <p>
            {{ 'La cotización fue creada con exito con el siguiente numero de cotización' }}
            <br>
            <b>
              <a id="pdfCoti" target="_blank" href="">
                Cotización: <span id="numCotizacionResult"></span>
              </a>
            </b>
            <br>
            <i>Nota: Da clic en el número para ver el PDF.</i><span id="DescMayor"></span>
          </p>
        </div>
        <div class="modal-footer">
          <a href=""><button id="return-home" type="button" class="an-btn an-btn-danger" data-dismiss="modal">{{ 'Regresar' }}</button></a>
          <a href=""><button id="new-Cotizacion" type="button" class="an-btn an-btn-success">{{ 'Nueva cotización' }}</button></a>
        </div>
    </div>
  </div>
</div>