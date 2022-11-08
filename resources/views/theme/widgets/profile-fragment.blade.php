<div class="row">
	<div class="col-md-12">
		<div class="an-single-component">
			<div class="an-component-header">
				<div class="an-component-header">
				</div>
			</div>
			<div class="an-component-body">
				<div class="an-helper-block">

					<div class="an-bootstrap-custom-tab an-vertical-tab">
					  
                      <div class="an-tab-control listview">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs text-center" role="tablist">
                          <li role="presentation" class="active">
                              <a href="#general" aria-controls="diska" role="tab" data-toggle="tab" aria-expanded="true">
                                  <i class="ion-ios-person-outline"></i>Informaci贸n general</a>
                          </li>
                          <!--<li role="presentation" class=""><a href="#diskb6" aria-controls="diskb" role="tab" data-toggle="tab" aria-expanded="false">
                          <i class="ion-earth"></i>Tab B</a>
                          </li>-->
                        </ul>
                      </div>

                      <!-- Tab panes -->
                      <div class="tab-content">
                      	<div class="text-center">
                      		<img id="info-loader" src="{{asset('assets/img/loading3.gif')}}" height="75">
                      	</div>
                        <div role="tabpanel" class="tab-pane fade active in" id="general">
                        	<div class="row">
	                          	<div class="col-md-6">
									<label>{{ 'Nombre' }}:</label>
									<div class="an-input-group">
										<div class="an-input-group-addon"><i class="ion-ios-person-outline"></i></div>
										<input type="text" id="name" class="an-form-control" disabled="disabled">
									</div>
									ID:
									<input type="text" id="id" class="an-form-control" disabled="disabled">
	                          	</div>
	                          	<div class="col-md-6">
									<label>{{ 'C贸digo SAP' }}:</label>
									<div class="an-input-group">
										<div class="an-input-group-addon"><i class="ion-pound"></i></div>
										<input type="text" id="slpcode" class="an-form-control" disabled="disabled">
									</div>                          		
	                          	</div>
                        	</div>
                        	<div class="row">
	                          	<div class="col-md-6">
									<label>{{ 'Email' }}:</label>
									<div class="an-input-group">
										<div class="an-input-group-addon"><i class="ion-at"></i></div>
										<input type="text" id="email" class="an-form-control" disabled="disabled">
									</div>
	                          	</div>
	                          	<div class="col-md-6">
									<label>{{ 'Tel茅fono' }}:</label>
									<div class="an-input-group">
										<div class="an-input-group-addon"><i class="ion-ios-telephone"></i></div>
										<input type="text" id="phone" class="an-form-control" disabled="disabled">
									</div>                          		
	                          	</div>
                        	</div>
                        	<div class="row">
	                          	<div class="col-md-6">
									<label>{{ 'Gerente' }}:</label>
									<div class="an-input-group">
										<div class="an-input-group-addon"><i class="ion-ios-people-outline"></i></div>
										<input type="text" id="manager" class="an-form-control" disabled="disabled">
									</div>
	                          	</div>
                        	</div>
                        </div>
                        

                        <div role="tabpanel" class="tab-pane fade" id="diskb6">
                          <p>
                            fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR.
                          </p>
                        </div>
                      </div>
                      
                        <div class="row">
                            <div class="col-md-7">
                            </div>
                            <div class="col-md-5 text-right">
                              <h3>Cambiar contrase&ntilde;a</h3>  
                            </div>
                        </div>
                      <div class="an-tab-control listview">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs text-center" role="tablist">
                          <li role="presentation" class="active">
                              <a href="#general" aria-controls="diska" role="tab" data-toggle="tab" aria-expanded="true">
                                  <i class="ion-ios-person-outline"></i>Seguridad</a>
                          </li>
                          <!--<li role="presentation" class=""><a href="#diskb6" aria-controls="diskb" role="tab" data-toggle="tab" aria-expanded="false">
                          <i class="ion-earth"></i>Tab B</a>
                          </li>-->
                        </ul>
                      </div>
                      <!-- Tab seguridad-->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="seguridad">
                            
                        	<div class="row">
	                          	<div class="col-md-6">
									<label>{{ 'Contraseña' }}:</label>
									<div class="an-input-group">
										<div class="an-input-group-addon"><i class=""></i></div>
										<input type="text" id="pass" class="an-form-control" placeholder="Nueva contrase&ntilde;a">
									</div>
	                          	</div>
	                          	<div class="col-md-6">
									<label>{{ 'Repetir contraseña' }}:</label>
									<div class="an-input-group">
										<div class="an-input-group-addon"><i class=""></i></div>
										<input type="text" id="passconf" class="an-form-control" placeholder="Repita nueva contrase&ntilde;a">
									</div>                          		
	                          	</div>
                        	</div>
                        	
                        	<div class="row">
                        	    <div class="col-md-9">
                        	    </div>
                        	    <div class="col-md-3">
                        	        <input type="submit" id="newPass" class="btn an-btn-primary" name="success" value="Cambiar Contrase&ntilde;a">
                        	        <img id="ajax-loader" src="{{ asset('assets/img/loading.gif') }}" height="20" style="display: none;"/></button>
                        	    </div>
                        	</div>
                        </div>
                        

                        <div role="tabpanel" class="tab-pane fade" id="diskb6">
                          <p>
                            fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR.
                          </p>
                        </div>
                      </div>
                      
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>