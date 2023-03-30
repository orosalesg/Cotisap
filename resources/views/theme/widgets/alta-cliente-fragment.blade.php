      <div class="an-single-component with-shadow">
          <div class="an-component-header">
              <h6>{{ 'Datos del cliente' }}</h6>
          </div>
          <div class="an-component-body">

              <div class="an-helper-block">
                  <div class="col-md-12">
                      <form id="alta-cliente-form">
                          <div class="col-md-6">
                              <label for="pContacto">{{ 'Razón Social' }}: </label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon"><i class="ion-android-person"></i></div>
                                  <!--<input type="text" id="pContacto" class="an-form-control not-null" name="pContacto" placeholder="{{ 'Introduzca el nombre de la persona de contacto' }}" maxlength="50"/>-->
                                  <select id="pContacto" name="pContacto" class="itemCodigo an-form-control"></select>
                              </div>
                              <label for="telCliente">{{ 'Teléfono' }}: </label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon"><i class="ion-ios-telephone"></i></div>
                                  <input type="tel" id="telCliente" class="an-form-control not-null phone" name="telCliente"
                                      placeholder="{{ 'Introduzca el teléfono' }}" maxlength="50" />
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label for="emailCliente">{{ 'Email' }}: </label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon"><i class="ion-at"></i></div>
                                  <input type="email" id="emailCliente" class="an-form-control not-null email"
                                      name="emailCliente" placeholder="{{ 'Introduzca el email' }}" maxlength="50" />
                              </div>
                              <!--<label for="razonCliente">{{ 'Razón social' }}: </label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon"><i class="ion-document-text"></i></div>
                                  <input type="email" id="razonCliente" class="an-form-control not-null"
                                      name="razonCliente" placeholder="{{'Introduzca la razón social del cliente'}}"
                                      maxlength="60" />
                              </div>-->
                          </div>
                          <div class="col-md-6">
                              <label for="emailCliente">{{ 'Domicilio' }}: </label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon"><i class="ion-home"></i></div>
                                  <textarea name="domicilioCliente" id="domicilioCliente" cols="30" 
                                    rows="10" class="an-form-control not-null"></textarea>
                              </div>
                          </div>
                          <div class="col-md-3 col-md-offset-9">
                              <label for="razonCliente">{{ 'Limite de crédito' }}: </label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon"><i class="ion-social-usd"></i></div>
                                  <input type="number" id="limiteCredito" class="an-form-control not-null"
                                      name="limiteCredito" step="1" value="0" />
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="col-md-offset-9">
                      <button type="button" class="an-btn an-btn-danger">{{ 'Cancelar' }}</button>
                      <button type="button" id="registrar" class="an-btn an-btn-success">{{ 'Registrar' }}</button>
                  </div>
              </div>

          </div>
      </div>
      <div class="row">
          <p class="an-small-doc-blcok" style="font-size:16px;" id="update-instr">¡Ahora ya puedes editar!.</p>
      </div>
      <div class="row">
          <div class="an-single-component with-shadow">
              <div class="an-component-header">
                  <h6>Clientes</h6>
                  <div class="component-header-right">
                      <form class="an-form" action="#">
                      </form>
                      <div class="an-default-select-wrapper">
                      </div>
                  </div>
              </div>
              <div class="an-component-body">
                  <div class="an-helper-block">
                      <div class="row">
                          <div class="col-md-12">
                              <!-- ver assets/js/users.js para llenado de tabla-->
                              <table id="clientesTable" class="table-hover" style="width:100%;">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Razón Social / Nombre Cliente</th>
                                          <th>Telefono</th>
                                          <th>Email</th>
                                          <th>Editar</th>
                                          <th>Eliminar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($clientes as $cliente)
                                      <tr>
                                          <td>{{ $cliente->id }}</td>
                                          <td>{{ $cliente->clienteNombre }}</td>
                                          <td>{{ $cliente->clienteTelefono }}</td>
                                          <td>{{ $cliente->clienteEmail }}</td>
                                          <td>
                                              <button type="button" data-id="{{ $cliente->id }}" class="btn btn-sm edit"
                                                  style="font-size:.8em;">
                                                  <img src="https://account.cotisap.com/assets/img/edit.png" height="30"
                                                      width="30" />
                                              </button>
                                          </td>
                                          <td>
                                              <button type="button" data-id="{{ $cliente->id }}"
                                                  class="btn btn-sm delete" style="font-size:.8em;">
                                                  <img data-id="{{ $cliente->id }}"
                                                      src="https://account.cotisap.com/assets/img/delete.png"
                                                      height="30" width="30" />
                                              </button>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade primary" id="editCliente" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                              aria-hidden="true">x</span></button>
                      <h4 style="" id="update-label">{{ 'Editar Usuario' }}</h4>
                  </div>
                  <div class="modal-body">
                      <p class="an-small-doc-blcok" id="update-instr">Modifica los campos que consideres necesarios.</p>
                      <div class="row">
                          <div class="col-md-12">
                              <label for="clienteId">Id :</label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon" id="title-icon"><i class="ion-pound"></i></div>
                                  <input id="clienteId" type="text" class="an-form-control" placeholder="Id"
                                      data-toggle="tooltip" title="Id" readonly />
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <label for="clienteNombre">Razón Social / Nombre Cliente :</label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon" id="title-icon"><i class="ion-android-person"></i>
                                  </div>
                                  <input id="clienteNombre" type="text" class="an-form-control"
                                      placeholder="Persona de contacto" data-toggle="tooltip"
                                      title="Persona de contacto" />
                              </div>
                          </div>
                          <!--<div class="col-md-6">
                              <label for="clienteRazon">Razon Social :</label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon" id="title-icon"><i class="ion-document-text"></i>
                                  </div>
                                  <input id="clienteRazon" type="text" class="an-form-control"
                                      placeholder="Razon Social" data-toggle="tooltip" title="Razon Social" />
                              </div>
                          </div>-->
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                              <label for="clienteEmail">Email :</label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon" id="title-icon"><i class="ion-at"></i></div>
                                  <input id="clienteEmail" type="text" class="an-form-control" placeholder="Email"
                                      data-toggle="tooltip" title="Email" />
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label for="clienteTelefono">Telefono :</label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon" id="title-icon"><i class="ion-ios-telephone"></i>
                                  </div>
                                  <input id="clienteTelefono" type="text" class="an-form-control"
                                      placeholder="clienteTelefono" data-toggle="tooltip" title="clienteTelefono" />
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-6">
                              <label for="clienteDomicilio">Domicilio :</label>
                              <div class="an-input-group">
                                  <div class="an-input-group-addon" id="title-icon"><i class="ion-home"></i>
                                  </div>
                                  <textarea name="clienteDomicilio" id="clienteDomicilio" class="an-form-control"
                                   placeholder="Domicilio " data-toogle="tooltip" title="Domicilio"
                                    cols="30" rows="10"></textarea>
                              </div>
                          </div>
                      </div>

                      <p class="an-small-doc-blcok" id="update-instr">Personas de Contacto.</p>

                      <div class="row">
                        <div class="col-md-6">
                            <label for="">Nombre</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon" id="title-icon"><i class="ion-home"></i>
                                </div>
                                <input id="cp_name" type="text" class="an-form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Correo</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon" id="title-icon"><i class="ion-home"></i>
                                </div>
                                <input id="cp_email" type="text" class="an-form-control"
                                    placeholder="" data-toggle="tooltip" title="Nombre" />
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <label for="">Telefono</label>
                            <div class="an-input-group">
                                <div class="an-input-group-addon" id="title-icon"><i class="ion-home"></i>
                                </div>
                                <input id="cp_phone" type="text" class="an-form-control"
                                    placeholder="Nombre" data-toggle="tooltip" title="Nombre" />
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <button class="btn btn-sm btn-success" id="btnSaveCP">Agregar persona</button>
                        </div>
                      </div>
                    <br>

                      <div class="row">
                        <div class="col-md-12">
                            <!-- ver assets/js/cntctperson.js para llenado de tabla-->
                            <table id="cpTable" class="table-hover" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Correo
                                        </th>
                                        <th>
                                            Telefono
                                        </th>
                                        <th>
                                            Actualizar
                                        </th>
                                        <th>
                                            Eliminar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="an-btn an-btn-danger" id="close"
                          data-dismiss="modal">{{ 'Cancelar' }}</button>
                      <button type="button" class="an-btn an-btn-success"
                          id="updateCliente"><span>{{ 'Guardar' }}</span>
                          <img id="ajax-loader" src="{{ asset('assets/img/loading.gif') }}" height="20"
                              style="display: none;" /></button>
                  </div>
              </div>
          </div>
      </div>