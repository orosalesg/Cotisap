
<!-- Informacion general -->

<div class="row">
	<div class="col-md-12">
		<div class="an-single-component">
			<div class="an-component-header">
				<h6>{{ 'Información General' }}</h6>
			</div>
			<div class="an-component-body">
				<div class="an-helper-block">
					<div class="row">
						<div class="col-md-6">
							<label>{{ 'Nombre o razón social' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="nombre_gral" class="an-form-control not-null">
							</div>								
						</div>
						<div class="col-md-3">
							<label>{{ 'RFC' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="rfc_gral" class="an-form-control not-null rfc">
							</div>								
						</div>
						<div class="col-md-3">
							<label>{{ 'Teléfono conmutador' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="tel_gral" class="an-form-control">
							</div>								
						</div>
					</div>
					<div class="row">														
						<div class="col-md-6">
							<label>{{ 'E-mail general' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="email" name="igNombre" id="email_gral" class="an-form-control not-null">
							</div>								
						</div>
						<div class="col-md-3">
							<label>{{ 'WebSite' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="web_gral" class="an-form-control">
							</div>								
						</div>
						<div class="col-md-3">
							<label>{{ 'Tipo de persona' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="persona_gral" class="an-form-control not-null uppercase">
							</div>								
						</div>	
					</div>			
				</div>
			</div>
		</div>

	</div>
</div>
<!-- Direccion fiscal -->

<div class="row">
	<div class="col-md-6">
		<div class="an-single-component">
			<div class="an-component-header">
				<h6>{{ 'Dirección fiscal' }}</h6>
			</div>
			<div class="an-component-body">
				<div class="an-helper-block">
						<div class="row">
							<div class="col-md-6">
								<label>{{ 'Calle y número' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="calle-fiscal" class="an-form-control not-null">
								</div>								
							</div>
							<div class="col-md-6">
								<label>{{ 'Colonia' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="colonia-fiscal" class="an-form-control not-null">
								</div>								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>{{ 'Ciudad' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="ciudad-fiscal" class="an-form-control not-null">
								</div>								
							</div>														
							<div class="col-md-6">
								<label>{{ 'Municipio / Delegación' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="municipio-fiscal" class="an-form-control not-null">
								</div>								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>{{ 'País' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="pais-fiscal" class="an-form-control not-null uppercase">
								</div>								
							</div>
							<div class="col-md-6">
								<label>{{ 'Código postal' }} <img id="cp-img-fiscal" hidden="hidden" height="18" src="{{ asset('assets/img/loading.gif') }}" /></label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="number" name="igNombre" id="cp-fiscal" class="an-form-control not-null">
								</div>								
							</div>														
						</div>						
				</div>
			</div>
		</div>

	</div>

<!-- Direccion de envio -->

	<div class="col-md-6">
		<div class="an-single-component">
			<div class="an-component-header">
				<h6>{{ 'Dirección de envío' }}</h6>
            	<div class="component-header-right">
	              <div class="btn-space">
	                    <button id="copy-btn" class="an-btn an-btn-success block-icon"> <i class="ion-ios-copy-outline"></i>Copiar dirección fiscal</button>
	              </div>
            	</div>
			</div>
			<div class="an-component-body">
				<div class="an-helper-block">
					<div class="row">
						<div class="col-md-6">
							<label>{{ 'Calle y número' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="calle-envio" class="an-form-control not-null">
							</div>								
						</div>
						<div class="col-md-6">
							<label>{{ 'Colonia' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="colonia-envio" class="an-form-control not-null">
							</div>								
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>{{ 'Ciudad' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="ciudad-envio" class="an-form-control not-null">
							</div>								
						</div>
						<div class="col-md-6">
							<label>{{ 'Municipio / Delegación' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="municipio-envio" class="an-form-control not-null">
							</div>								
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>{{ 'País' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" name="igNombre" id="pais-envio" class="an-form-control not-null uppercase">
							</div>								
						</div>
						<div class="col-md-6">
							<label>{{ 'Código postal' }} <img id="cp-img-envio" hidden="hidden" height="18" src="{{ asset('assets/img/loading.gif') }}" /></label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="number" name="igNombre" id="cp-envio" class="an-form-control not-null">
							</div>								
						</div>														
					</div>						
				</div>
			</div>
		</div>

	</div>
</div>

<div class="row">


<!-- Personas de contacto -->
	<!--<div class="col-md-6">
		<div class="an-single-component">
			<div class="an-component-header">
				<h6>{{ 'Personas de contacto' }}</h6>
			</div>
			<div class="an-component-body">
				<div class="an-helper-block">
						<div class="row">
							<div class="col-md-4">
								<label>{{ 'Compras' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="nombre-compras" class="an-form-control not-null" >
								</div>								
							</div>
							<div class="col-md-4">
								<label>{{ 'Tel&eacute;fono' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="telefono-compras" class="an-form-control not-null phone">
								</div>								
							</div>
							<div class="col-md-4">
								<label>{{ 'Email' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="email" name="igNombre" id="email-compras" class="an-form-control  not-null">
								</div>								
							</div>														
						</div>

						<div class="row">
							<div class="col-md-4">
								<label>{{ 'Recepción de Documentos' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="nombre-docs" class="an-form-control not-null">
								</div>								
							</div>
							<div class="col-md-4">
								<label>{{ 'Tel&eacute;fono' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="telefono-docs" class="an-form-control not-null phone">
								</div>								
							</div>
							<div class="col-md-4">
								<label>{{ 'Email' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="email" name="igNombre" id="email-docs" class="an-form-control not-null">
								</div>								
							</div>														
						</div>

						<div class="row">
							<div class="col-md-4">
								<label>{{ 'Pagos' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="nombre-pagos" class="an-form-control not-null">
								</div>								
							</div>
							<div class="col-md-4">
								<label>{{ 'Tel&eacute;fono' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="text" name="igNombre" id="telefono-pagos" class="an-form-control not-null phone">
								</div>								
							</div>
							<div class="col-md-4">
								<label>{{ 'Email' }}</label>
								<div class="an-input-group">
									<div class="an-input-group-addon"><i></i></div>
									<input type="email" name="igNombre" id="email-pagos" class="an-form-control not-null">
								</div>								
							</div>														
						</div>						
					
				</div>
			</div>
		</div>

	</div>-->

<!-- -Personas de contacto v2 -->

	<div class="col-md-12">
		<div class="an-single-component">
			<div class="an-component-header">
				<h6>{{ 'Personas de contacto' }}</h6>
			</div>
			<div class="an-component-body">
				<div class="an-helper-block">
					<div class="row" id="persons-container">
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>{{ 'Tipo' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" id="tipo_persona" class="an-form-control" placeholder="v.g. Compras, Pagos, ...">
							</div>								
						</div>
						<div class="col-md-3">
							<label>{{ 'Nombre' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" id="nombre_persona" class="an-form-control">
							</div>								
						</div>
						<div class="col-md-3">
							<label>{{ 'Email' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" id="email_persona" class="an-form-control">
							</div>								
						</div>
						<div class="col-md-3">
							<label>{{ 'Téléfono' }}</label>
							<div class="an-input-group">
								<div class="an-input-group-addon"><i></i></div>
								<input type="text" id="phone_persona" class="an-form-control">
							</div>								
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 col-md-offset-9">
							<button id="add-person" class="an-btn btn-block an-btn-info block-icon"> <i class="ion-plus"></i>Agregar persona</button>
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
              <input type="submit" id="cancel" class="btn an-btn-danger" name="cancel" value="{{ 'Cancelar' }}">
              <input type="submit" id="success" class="btn an-btn-primary" name="success" value="{{ 'Enviar solicitud' }}">
              <img src="{{asset('assets/img/loading.gif')}}" height="30" width="30" id="mail-loader" style="display: none;" />
            </div>            
          </div>
        </div>
      </div>     
    </div>
  </div>
</div>