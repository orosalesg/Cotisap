<div class="row">
    <div class="col-md-12">
        <div class="an-single-component with-shadow">
            <div class="an-component-header" style="display:block;">
                <div class="row">
                    <div class="col-md-4">
                        <h6>{{ 'Datos del cliente.' }}</h6>
                    </div>
                </div>

            </div>
            <div class="an-component-body">
                <div class="an-helper-block">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="an-input-group">
                                <label for="pContacto">{{ '*Persona de contacto' }}: </label>
                                <!--<input type="text" id="pContacto" class="an-form-control not-null" name="pContacto" placeholder="{{ 'Introduzca el nombre de la persona de contacto' }}" maxlength="50"/>-->
                                <select id="pContacto" name="pContacto" class="itemCodigo an-form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="emailCliente">{{ '*Email' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-at"></i></div>
                                <input type="email" id="emailCliente" class="an-form-control not-null"
                                    name="emailCliente" placeholder="{{ 'Introduzca el email' }}" maxlength="50" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="telCliente">{{ '*Teléfono' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-ios-telephone"></i></div>
                                <input type="tel" id="telCliente" class="an-form-control not-null" name="telCliente"
                                    placeholder="{{ 'Introduzca el teléfono' }}" maxlength="50" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="razonCliente">{{ '*Razón social' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-document-text"></i></div>
                                <input type="email" id="razonCliente" class="an-form-control not-null"
                                    name="razonCliente" placeholder="{{'Introduzca la razón social del cliente'}}"
                                    maxlength="60" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="rfcCliente">{{ 'RFC' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class=""></i></div>
                                <input type="text" id="rfcCliente" class="an-form-control not-null" name="rfcCliente"
                                    placeholder="{{'Introduzca el rfc del cliente'}}" maxlength="60" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="emailCliente">{{ '*Domicilio' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-home"></i></div>
                                <textarea name="domicilioCliente" id="domicilioCliente" cols="30" rows="10"
                                    class="an-form-control not-null"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-left:20px;padding-right:20px;">
                        <p class="an-small-doc-blcok" style="font-size:16px;" id="update-instr">Informacion de
                            entrega.(opcional)</p>
                        <div class="col-md-12"><span>*Dejando en blanco los campos, se utilizará la información de
                                arriba</span></div><br>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="personaContacto">{{ 'Persona de contacto' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class="ion-android-person"></i></div>
                                <input type="text" id="personaContacto" class="an-form-control" name="personaContacto"
                                    placeholder="{{'Persona de contacto'}}" maxlength="60" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="domicilioEntrega">{{ 'Domicilio de entrega' }}: </label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon"><i class=""></i></div>
                                <input type="text" id="domicilioEntrega" class="an-form-control" name="domicilioEntrega"
                                    placeholder="{{'Direccion de entrega'}}" maxlength="60" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-12">
        <div class="an-single-component with-shadow h-100">

            <!--
      ______                          _                                _                 _            _             _   _         _           
     |  ____|                        | |                              | |               | |          | |           | | (_)       | |          
     | |__     _ __     ___    __ _  | |__     ___   ____   __ _    __| |   ___       __| |   ___    | |   __ _    | |  _   ___  | |_    __ _ 
     |  __|   | '_ \   / __|  / _` | | '_ \   / _ \ |_  /  / _` |  / _` |  / _ \     / _` |  / _ \   | |  / _` |   | | | | / __| | __|  / _` |
     | |____  | | | | | (__  | (_| | | |_) | |  __/  / /  | (_| | | (_| | | (_) |   | (_| | |  __/   | | | (_| |   | | | | \__ \ | |_  | (_| |
     |______| |_| |_|  \___|  \__,_| |_.__/   \___| /___|  \__,_|  \__,_|  \___/     \__,_|  \___|   |_|  \__,_|   |_| |_| |___/  \__|  \__,_|
    -->

            <div class="an-component-header">
                <div class="col-md-6">
                    <div class="an-input-group">
                        <h6>{{ 'Equipo a entregar' }}</h6>
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
                        <div class="col-sm-1">
                            <span>{{ '# Artículo *' }}<br><br></span>
                        </div>
                        <div class="col-sm-2">
                            <span>{{ 'Cantidad *' }}<br><br></span>
                        </div>
                        <div class='col-sm-3'>
                            <span>{{ 'Equipo' }}<br></span>
                        </div>
                        <div class="col-sm-2">
                            <span>{{ 'Modelo' }}<br></span>
                        </div>

                        <div class="col-sm-3 ">
                            <span>{{ 'MACID/Número de serie' }}<br></span>
                        </div>
                        <div class="col-sm-1">

                        </div>
                    </div>

                    <div id="contenerdor-products">
                        @foreach($DeliverArt as $articulo)
                        <div id="item-product[{{ $articulo->numLine }}]" class="item-product row" data-type="update" data-product="{{ $articulo->id }}">
                            <div class="row">
                                <div class="col-md-1">
                                    <span class="item-id">{{ $loop->iteration }}</span>
                                </div>
                                <div class="col-md-2">
                                    <div class="an-input-group">
                                        <input type="number" 
                                        id="itemCantidad[{{ $loop->iteration }}]" 
                                        name="itemCantidad[{{ $loop->iteration }}]"
                                            class="itemCantidad an-form-control" value="{{ $articulo->cantidad }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="an-input-group">
                                        <textarea name="itemName[{{ $loop->iteration }}]" 
                                        id="itemName[{{ $loop->iteration }}]"
                                            class="itemName an-form-control" cols="30" rows="10"
                                            maxlength="255"> {{ $articulo->descripcion }} </textarea>
                                        <!--<input type="text" id="itemName[{{ $loop->iteration }}]" name="itemName[{{ $loop->iteration }}]" class="itemName an-form-control" maxlength="255">-->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="an-input-group">
                                        <input type="text" 
                                            id="itemCodigo[{{ $loop->iteration }}]" 
                                            name="itemCodigo[{{ $loop->iteration }}]"
                                            class="itemCodigo an-form-control"
                                            value="{{ $articulo->modelo }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="an-input-group">
                                        <input type="text" name="itemNoserie[{{ $loop->iteration }}]" id="itemNoserie[{{ $loop->iteration }}]"
                                            class="itemNoserie an-form-control">
                                        <!--<input type="text" id="itemName[{{ $loop->iteration }}]" name="itemName[{{ $loop->iteration }}]" class="itemName an-form-control" maxlength="255">-->
                                    </div>
                                </div>
                                <div class="col-md-1 itemClose">
                                    <span>
                                        <i id="itemClose[{{ $loop->iteration }}]" class="ion-android-close"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row">

                        <div class="col-md-12 text-right">
                            <button id="createProduct" class="an-btn an-btn-success block-icon"> <i
                                    class="ion-plus-round"></i>Agregar artículo</button>
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
                    <div class="row justify-content-center">
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-2">
                            <button id="saveDeliver" class="an-btn an-btn-success">
                                Guardar
                            </button>
                            <img id="loading" hidden="hidden" height="18" src="{{ asset('assets/img/loading.gif') }}"
                                style="display: none;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!----------------------------------------------------------
            contenedor de productos
------------------------------------------------------------->

<div class="d-none">

    <!-- Inicio producto -->
    <div id="product-base">
        <div id="item-product[Element]" class="item-product row">
            <div class="row">
                <div class="col-md-1">
                    <span class="item-id">{{ 'Element' }}</span>
                </div>
                <div class="col-md-2">
                    <div class="an-input-group">
                        <input type="number" id="itemCantidad[Element]" name="itemCantidad[Element]"
                            class="itemCantidad an-form-control" value="1">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="an-input-group">
                        <textarea name="itemName[Element]" id="itemName[Element]" class="itemName an-form-control"
                            cols="30" rows="10" maxlength="255"></textarea>
                        <!--<input type="text" id="itemName[Element]" name="itemName[Element]" class="itemName an-form-control" maxlength="255">-->
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="an-input-group">
                        <input type="text" id="itemCodigo[Element]" name="itemCodigo[Element]"
                            class="itemCodigo an-form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="an-input-group">
                        <input type="text" name="itemNoserie[Element]" id="itemNoserie[Element]"
                            class="itemNoserie an-form-control">
                        <!--<input type="text" id="itemName[Element]" name="itemName[Element]" class="itemName an-form-control" maxlength="255">-->
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
</div>

<!-- Agregar nuevo registro -->
<div class="modal fade primary" id="addCotizacion" tabindex="-1" role="dialog" aria-labelledby="addCotizacion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="addCotizacionLabel">{{ 'Hoja de entrega' }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    {{ 'La hoja de entrega fue creada con exito con el siguiente folio:' }}
                    <br>
                    <b>
                        <a id="pdfCoti" target="_blank" href="">
                            Hoja de entrega: <span id="numCotizacionResult"></span>
                        </a>
                    </b>
                    <br>
                    <i>Nota: Da clic en el número para ver el PDF.</i><span id="DescMayor"></span>
                </p>
            </div>
            <div class="modal-footer">
                <a href=""><button id="return-home" type="button" class="an-btn an-btn-danger"
                        data-dismiss="modal">{{ 'Regresar' }}</button></a>
                <a href="{{ URL::route('showCrearHE') }}"><button id="new-Cotizacion" type="button"
                        class="an-btn an-btn-success">{{ 'Nueva Hoja' }}</button></a>
            </div>
        </div>
    </div>
</div>