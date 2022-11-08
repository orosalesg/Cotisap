        
              <div class="an-single-component with-shadow">

                <div class="an-helper-block">
                  <div class="an-component-header">
                    <h6>Información por vendedor <img src="{{asset('assets/img/loading.gif')}}" height="30" width="30" id="slp-loader" style="margin-left: 50px;"/></h6>
                    <div class="component-header-right">
                      <span>Selecciona un vendedor: </span>
                      <div class="an-default-select-wrapper salespersons-wrapper" style="margin:0px;margin-left:5px;">
                      </div>
                    </div>
                  </div>

                  <div class="an-component-body" id="salespersons-container">
                    <div class="row">
                      <div class="col-md-6">
                        <canvas id="quotations-salesperson-graph" width="400" height="300"></canvas>
                      </div>
                      <div class="col-md-6">
                        <canvas id="products-salesperson-graph" width="400" height="300"></canvas>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <canvas id="quotations-status-salesperson-graph" width="100" height="100"></canvas>
                      </div>
                      <div class="col-md-4">
                        <canvas id="hitrate-salesperson-graph" width="100" height="100"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>