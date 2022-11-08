          <div class="an-panel-main-info">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="an-panel-main-info-single color-cyan with-shadow wow fadeIn" data-wow-delay=".1s">
                  <h2><span class="percentage">94.9%</span><span class="info-identifier">{{ 'Cotizaciones cerradas' }}</span></h2>
                  <i class="icon-chart"></i>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="an-panel-main-info-single lime-green with-shadow wow fadeIn" data-wow-delay=".2s">
                  <h2><span style="display:none;" id="total_quotations"></span><div class="text-center" id="tq_loader"><img src="{{asset('assets/img/loading.gif')}}" width="40" height="33"/></div><span class="info-identifier">{{ 'Total de cotizaciones' }}</span></h2>
                  <i class="ion-document-text"></i>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="an-panel-main-info-single pale-yellow with-shadow wow fadeIn" data-wow-delay=".3s">
                  <h2><span style="display:none;font-size:15px;" id="last_quotation"></span><div class="text-center" id="lq_loader"><img src="{{asset('assets/img/loading.gif')}}" width="40" height="33"/></div><span class="info-identifier">{{ 'Ultima cotizaci&oacute;n' }}</span></h2>
                  <a href="#" target="_blank" id="last_quotation_link"><button style="position:absolute;top:10px;right: 10px;" class="an-btn btn-warning">Ver</button></a>
                  <i class="ion-cash"></i>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="an-panel-main-info-single soft-pink with-shadow wow fadeIn" data-wow-delay=".4s">
                  <h2><span id="days-left"></span> <span class="info-identifier" id="days-left-text"></span></h2>
                  <i class="ion-calendar"></i>
                </div>
              </div>

            </div>
          </div> 