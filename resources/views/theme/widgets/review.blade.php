          <div class="an-body-topbar wow fadeIn">
            <div class="an-page-title">
              <h2>{{ 'Vista general' }}</h2>
              <p>{{ 'Bienvenido' }}, 

                 {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}

                <a href="#"><i class="icon-marker"></i>{{ 'Ubicación' }}: <span id="location">México</span></a>
              </p>
            </div>
          </div>
          @include('theme.widgets.datos')

          <div class="row an-masonry-layout">
            <div class="col-md-6 grid-item">
              @include('theme.widgets.slider')
            </div>
            
            @if(session('domain') == 'gruposim.com' && !empty(Auth::user()->U_admin))
            <div class="col-md-6 grid-item">
              @include('theme.widgets.kpi.autorize-coti')  
            </div>
            @endif
          </div>  
          <div class="row">
            <div class="col-md-6">
              @include('theme.widgets.kpi.quick-article')
            </div>
          </div>   
          <div class="row">
            <div class="col-md-3">
              @include('theme.widgets.kpi.hitrate-wheel')
            </div>
            <div class="col-md-4 ">
              @include('theme.widgets.kpi.general-quotations')
            </div>
            <div class="col-md-4">
              @include('theme.widgets.kpi.cotizaciones-wheel')
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              @include('theme.widgets.kpi.salesperson-info')
            </div>
          </div>  
          <div class="row">
            <div class="col-md-12">
              @include('theme.widgets.kpi.estado-cuenta');
            </div>
          </div>