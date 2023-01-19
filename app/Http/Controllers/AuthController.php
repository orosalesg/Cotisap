<?php

namespace App\Http\Controllers;

use DB;
use View;
use Input;
use App\Lib\Libraries as Lib;
use App\Http\Controllers\Config;
use App\Models\User;
use App\Models\Rol;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/* LOGIN MICROSOFT */
use Laravel\Socialite\Facades\Socialite;
use Microsoft\Graph\Graph;
use Session;

use Barryvdh\Debugbar\Facade as Debugbar;


class AuthController extends Controller
{


    /*
     * Controladores para la autenticacion de los usuarios
     */

    /**
     *
     * @param void
     * @return view
     */

    public function showLogin()
    {
    	
    	if (Auth::check()) {
    		
            if( !strcmp('cotisap.com', explode('@', Auth::user()->email)[1]) ){
                return redirect()->route('sDashboard');
            }else return redirect()->route('dashboard');
    	}    	
    
    	return \View::make('login');
    }

    /**
     *
     * @param void
     * @return view
     */

    public function postLogin(Request $request) 
    {

    	$userData = array(
    		'email' => $request->username,
    		'password' => $request->password
    	);

    	if(Auth::attempt($userData)) {
            if( !strcmp('cotisap.com', explode('@', Auth::user()->email)[1]) ){
                return redirect()->route('sDashboard');
            } else {

                $email = Auth::user()->email;

                $company = Company::where('dominio' ,explode('@', $email)[1])
                        ->get();
                /*$rolvalomar = Auth::user()->U_admin ? Auth::user()->U_admin : "V";
                $rolsessionomar = Rol::where('rol', $rolvalomar)->get();*/
                
                $loginsess = array(
                    'HOST_Sap' => $company[0]->HOST_Sap,
                    'PORT_Sap' => $company[0]->PORT_Sap,
                    'DB_Sap' => $company[0]->DB_Sap,
                    'USER_Sap' => $company[0]->USER_Sap,
                    'PASS_Sap' => $company[0]->PASS_Sap,
                    'HOST_SAP_API' => $company[0]->HOST_SAP_API,
                    'USER_SAP_API' => $company[0]->USER_SAP_API,
                    'PASS_SAP_API' => $company[0]->PASS_SAP_API,
                    //'access_token' => $dataToken,
                    'DB_SAP_API' => $company[0]->DB_SAP_API,
                    'Company' => $company[0]->Company,
                    'factClave' => $company[0]->factClave,
                    'FatherNum' => $company[0]->FatherNum,
                    'domain' => $company[0]->dominio
                );
                
                Session::push('log', $loginsess);
                //session();
                session()->save();


                /*Set Theme Colors in Cookies*/
                $sql = 'SELECT * FROM '.$company[0]->Company.'_colors';
                $colors = Lib::querySQLMYSQL($sql);
                $cookie = cookie()->forever('colors', json_encode($colors));
                
                return redirect()->route('dashboard')->withCookie($cookie);;
            } 
    	} else{
            return redirect()
    			->route('login')
    			->with('mensaje_error', 'Tus datos son incorrectos');
        }

    }

    /**
     *
     * @param void
     * @return view
     */

    public function logOut()
    {
        
        Auth::logout();

        session()->flush();

        return redirect()
                ->route('login')
                ->with('mensaje_error', 'Tu sesión ha sido cerrada.');


    }


    public function ShowUsers(Request $request){

        $Usuarios = User::where(
            'email',
            'like',
            '%@'.explode('@',Auth::user()->email)[1]
        )->get();
        
        $roles = Rol::all();

        return view('theme.administracion.usuarios', [
            'usuarios' => $Usuarios,
            'roles' => $roles
        ]);
    }


    public function login()
    {
        $accessToken = $oauthClient->getAccessToken('authorization_code', [
            'code' => $authCode
          ]);
          
        $graph = new Graph();
        $graph->setAccessToken($accessToken->getToken());

        $user = $graph->createRequest('GET', '/me')
            ->setReturnType(Model\User::class)
            ->execute();

        $tokenCache = new TokenCache();
        $tokenCache->storeTokens($accessToken, $user);
        // HERE YOU CAN SAVE THE USER IN THE DB + LOGIN WITH LARAVEL

        //https://stackoverflow.com/questions/38268137/laravel-5-2-split-string-first-name-last-name
        $split = explode(" ", session('userName'));
        $firstname = array_shift($split);
        $lastname  = implode(" ", $split);



        $user = User::firstOrCreate([
            'email' =>  session('userEmail')
        ], [
            'surname' => $lastname,
            'name' => $firstname,
            'password' => 'secret'
        ]);
        auth()->login($user);
        //dd($user);
        //redirect to home page
        return redirect('/home');
    }


    public function setRol(Request $request){

        $rol = Rol::find($request->id);
        $rol->dataConfig = json_encode($request->dataConfig);
        if(session('domain') == 'gruposim.com'){
            $rol->maxdesc = $request->maxdesc;
        }
        return response()->json([ 
            'status' => $rol->save() === true ? "true" : "false"
            ]);
    }

    public function getRol(Request $request){

        $rol = Rol::find($request->id);

        return $rol;

    }

    public function loginaz()
    {
        $graph = new Graph();
        $graph->setAccessToken($accessToken->getToken());


        $user = $graph->createRequest('GET', '/me')
            ->setReturnType(Model\User::class)
            ->execute();

        $tokenCache = new TokenCache();
        $tokenCache->storeTokens($accessToken, $user);
        // HERE YOU CAN SAVE THE USER IN THE DB + LOGIN WITH LARAVEL

        //https://stackoverflow.com/questions/38268137/laravel-5-2-split-string-first-name-last-name
        $split = explode(" ", session('userName'));
        $firstname = array_shift($split);
        $lastname  = implode(" ", $split);

        $user = User::firstOrCreate([
            'email' =>  session('userEmail')
        ], [
            'surname' => $lastname,
            'name' => $firstname,
            'password' => 'secret'
        ]);
        

        if(auth()->login($user)) {
            if( !strcmp('cotisap.com', explode('@', Auth::user()->email)[1]) ){
                return redirect()->route('sDashboard');
            } else {

                $email = session('userName');

                $company = Company::where('dominio' ,explode('@', $email)[1])
                        ->get();
                /*$rolvalomar = Auth::user()->U_admin ? Auth::user()->U_admin : "V";
                $rolsessionomar = Rol::where('rol', $rolvalomar)->get();*/
                session([
                    'HOST_Sap' => $company[0]->HOST_Sap,
                    'PORT_Sap' => $company[0]->PORT_Sap,
                    'DB_Sap' => $company[0]->DB_Sap,
                    'USER_Sap' => $company[0]->USER_Sap,
                    'PASS_Sap' => $company[0]->PASS_Sap,
                    'HOST_SAP_API' => $company[0]->HOST_SAP_API,
                    'USER_SAP_API' => $company[0]->USER_SAP_API,
                    'PASS_SAP_API' => $company[0]->PASS_SAP_API,
                    //'access_token' => $dataToken,
                    'DB_SAP_API' => $company[0]->DB_SAP_API,
                    'Company' => $company[0]->Company,
                    'factClave' => $company[0]->factClave,
                    'FatherNum' => $company[0]->FatherNum,
                    'domain' => $company[0]->dominio
                ]);

                /*Set Theme Colors in Cookies*/
                $sql = 'SELECT * FROM '.$company[0]->Company.'_colors';
                $colors = Lib::querySQLMYSQL($sql);
                $cookie = cookie()->forever('colors', json_encode($colors));
                
                return redirect()->route('dashboard')->withCookie($cookie);
            } 
    	}
        //dd($user);
        //redirect to home page
    }


    public function logoutaz(Request $request) 
    {
        Auth::guard()->logout();
        $request->session()->flush();
        $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));
        return redirect($azureLogoutUrl);
    }

    public function authredirect() 
    {
        return Socialite::driver('azure')->redirect();
    }

    public function callback() 
    {
        $azureuser = Socialite::driver('azure')->user();

        $azid = $azureuser->id;
        $azname = $azureuser->name;
        $azemail = $azureuser->email;
        $aztoken = $azureuser->token;
        $azrefToken = $azureuser->refreshToken;

        $user = User::updateOrCreate([
            'email' => strval($azemail),
        ], [
            'azure_id' => strval($azureuser->id),
            'azure_token' => strval($azureuser->token),
            'azure_refresh_token' => strval($azureuser->refreshToken),
            'name' => strval($azureuser->name),
            'email' => strval($azureuser->email)
        ]);

        Auth::login($user);

        if( !strcmp('cotisap.com', explode('@', Auth::user()->email)[1]) ){
            return redirect()->route('sDashboard');
        } else {
            //dd(Auth::user());

            if(Auth::user() != null){
                $email = Auth::user()->email;

                $company = Company::where('dominio' ,explode('@', $email)[1])
                        ->get();
                /*$rolvalomar = Auth::user()->U_admin ? Auth::user()->U_admin : "V";
                $rolsessionomar = Rol::where('rol', $rolvalomar)->get();*/
                
                session([
                    'HOST_Sap' => $company[0]->HOST_Sap,
                    'PORT_Sap' => $company[0]->PORT_Sap,
                    'DB_Sap' => $company[0]->DB_Sap,
                    'USER_Sap' => $company[0]->USER_Sap,
                    'PASS_Sap' => $company[0]->PASS_Sap,
                    'HOST_SAP_API' => $company[0]->HOST_SAP_API,
                    'USER_SAP_API' => $company[0]->USER_SAP_API,
                    'PASS_SAP_API' => $company[0]->PASS_SAP_API,
                    //'access_token' => $dataToken,
                    'DB_SAP_API' => $company[0]->DB_SAP_API,
                    'Company' => $company[0]->Company,
                    'factClave' => $company[0]->factClave,
                    'FatherNum' => $company[0]->FatherNum,
                    'domain' => $company[0]->dominio
                ]);

                /*Set Theme Colors in Cookies*/
                $sql = 'SELECT * FROM '.$company[0]->Company.'_colors';
                $colors = Lib::querySQLMYSQL($sql);
                //cookie()->forever(nombre, valor,minutos,path,domain,secure,httponly);
                $cookie = cookie()->forever('colors', json_encode($colors),0,null,null,false,false);
                
                return redirect()->route('dashboard')->withCookie($cookie);
            }else{

                return redirect()
    			->route('login')
    			->with('mensaje_error', 'Tus datos son incorrectos');
            }
            
        }

        
    }
}
