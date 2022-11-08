
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Login | COTISAP</title>
        
        <link rel="shortcut icon" href="/assets/img/cotisap/logosap.png" type="image/x-icon">
		
		<!-- CORE CSS--> 
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

    </head>
    <body>
    	<ul class="loginSlideShow">
    		<li><span>&nbsp;</span></li>
    		<li><span>&nbsp;</span></li>
    		<li><span>&nbsp;</span></li>
    		<li><span>&nbsp;</span></li>
    		<li><span>&nbsp;</span></li>
    		<li><span>&nbsp;</span></li>
    	</ul>
    	<div class="container-fluid">
    		<div class="row">
		        <div class="col-lg-7 col-md-7 no-padding hidden-sm-down"></div>
		        <div id="loginContainer" class="col-lg-5 col-md-5 col-sm-12">
		        	<div class="container-forms">
						<br>
						<br>
						<br>
			            <!--<div id="logoLogin">
			   
			            </div>  -->       
			            
			            @if(Session::has('mensaje_error'))
                        	<div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                    	@endif

			            <div id="messages" class="alert alert-info" role="alert" style="display:none"></div>
			            
			            <form id="formLogin" action="{{ URL::route('azredirect') }}" method="get">

							{{ csrf_field() }}
			                
			                 {{-- <div id="usernameContainer">
			                    <div class="inner-addon left-addon">
			                        <i class="fa fa-user"></i>
			                        <input id="username" type="text" name="username" class="form-control" placeholder="Usuario" />
			                    </div>
			                    <div class="inner-addon left-addon">
			                        <i class="fa fa-key"></i>
			                        <input id="password" type="password" name="password" class="form-control" placeholder="Contraseña" />
			                    </div>
			                    <input id="next" type="submit" class="btn btn-primary btn-block" value="Iniciar sesión">
			                    <div class="divider-login"> - o - </div>
			                    <div id="cont"></div>
			                    <button id="register" type="button" class="btn btn-success">Contáctanos</button>
			                </div>
							<div class="bg-primary">

							</div>
							--}}
							
			            </form>
						<div class=" py-4">
							<a href="{{ URL::route('azredirect') }}" class="btn btn-primary btn-block">
									Login con Microsoft &nbsp;
									<img src="{{ asset('assets/img/login/microsoftlogin1.png') }}" alt="microsoftlogin" height="30" width="30" srcset="">
							</a>
						</div>
						
						
						<address class="copy"></address>
		        	<div>
			    </div>
    		</div>
    	</div>
        <script src="{{ asset('assets/js-plugins/bootstrap.min.js') }}" type="text/javascript"></script>
    </body>
</html>