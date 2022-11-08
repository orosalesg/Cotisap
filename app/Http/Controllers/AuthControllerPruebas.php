<?php

namespace App\Http\Controllers;

use DB;
use View;
use Input;
use App\Lib\Libraries as Lib;
use App\Http\Controllers\Config;
use App\Models\UserPrueba as User;
use App\Models\Rol;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControllerPruebas extends Controller
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
                
                return redirect()->route('dashboard')->withCookie($cookie);;
            } 
    	}

    	return redirect()
    			->route('login')
    			->with('mensaje_error', 'Tus datos son incorrectos');

    }

    /**
     *
     * @param void
     * @return view
     */

    public function logOut()
    {
        
        Auth::logout();

        return redirect()
                ->route('login')
                ->with('mensaje_error', 'Tu sesión ha sido cerrada.');


    }

    public function index(){
        $Usuarios = User::where(
            'email',
            'like',
            '%@'.explode('@',Auth::user()->email)[1]
        )->get();
        
        $roles = Rol::all();
        
    	return view('theme.administracion.usuariospruebas', [
            'usuarios' => $Usuarios,
            'roles' => $roles
        ]);
    }
    
    //En caso de tener /all va a regresar la lista de todos los usuarios
    public function show($id){
        if(!strcmp($id, 'all')) {
             if(explode('@',Auth::user()->email)[1] == "mbrhosting.com" || explode('@',Auth::user()->email)[1] == "mbr.mx"){
                    $Usuarios = User::where(
                    'email',
                    'like',
                    '%@mbr%'
                    )->get();
                }else{
                    $Usuarios = User::where(
                    'email',
                    'like',
                    '%@'.explode('@',Auth::user()->email)[1]
                    )->get();   
                }
            return response()->json([
                'status' => true,
                'data' => $Usuarios 
            ]);
        } else {

            return response()->json([
                'status' => (User::find($id)) ? true : false,
                'data' => User::find($id)
            ]);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password) ;
        $user->SlpCode = $request->SlpCode == !isset($request->SlpCode) ? "" : $request->SlpCode;
        $user->remember_token = $request->remember_token == !isset($request->remember_token) ? "" : $request->remember_token;
        $user->created_at = $request->created_at == !isset($request->created_at) ? "" : $request->remember_token;;
        $user->updated_at = $request->updated_at;
        $user->commission = $request->commission;
        $user->GroupCode = $request->GroupCode;
        $user->Locked = $request->Locked;
        $user->DataSource = $request->DataSource;
        $user->UserSign = $request->UserSign;
        $user->EmpID = $request->EmpID;
        $user->Active = $request->Active;
        $user->Telephone = $request->Telephone;
        $user->Mobil = $request->Mobil;
        $user->U_admin = $request->U_admin;
        $user->U_branch = $request->U_branch;
        $user->U_salt = $request->U_salt;
        $user->U_priceList = $request->U_priceList;
        $user->U_manager = $user->U_manager;
        $user->U_export = $user->U_export;
        $user->U_discounts = $request->U_discounts;

        return response()->json([
            'status' => $user->save(),
            'id' => $user->id
        ]);
    }
    /**
     * Update the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->SlpCode = $request->SlpCode;
        $user->updated_at = $request->updated_at;
        $user->commission = $request->commission;
        $user->GroupCode = $request->GroupCode;
        $user->Locked = $request->Locked;
        $user->DataSource = $request->DataSource;
        $user->UserSign = $request->UserSign;
        $user->EmpID = $request->EmpID;
        $user->Active = $request->Active;
        $user->Telephone = $request->Telephone;
        $user->Mobil = $request->Mobil;
        $user->U_admin = $request->U_admin;
        $user->U_branch = $request->U_branch;
        $user->U_salt = $request->U_salt;
        $user->U_priceList = $request->U_priceList;
        $user->U_manager = $request->U_manager;
        $user->U_export = $request->U_export;
        $user->U_discounts = $request->U_discounts;
        return response()->json([
            'status' => $user->save()
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
        /*$user = User::find($id);
        return response()->json([
            'status' => $user->delete()
        ]);
*/
    }
    
    public function ShowUsers(Request $request){
    
        if(explode('@',Auth::user()->email)[1] == "mbrhosting.com"){
            $Usuarios = User::where(
            'email',
            'like',
            '%@mbr'
        )->get();
        }else{
            $Usuarios = User::where(
            'email',
            'like',
            '%@'.explode('@',Auth::user()->email)[1]
        )->get();   
        }
        
        $roles = Rol::all();

        return view('theme.administracion.usuariospruebas', [
            'usuarios' => $Usuarios,
            'roles' => $roles
        ]);
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
    
    public function sapconn(){

            
            /*$vCmp = new COM("SAPbobsCOM.company") or die ("No connection");
            
            $vCmp->server = session('HOST_SAP_API');
            
            $vCmp->CompanyDB = "SBO_MBR";
                    
            $vCmp->username = session('USER_SAP_API');
            
            $vCmp->password = session('PASS_SAP_API');
            
            //$vCmp->language = "ln_English";
            
            //$vCmp->UseTrusted = True;
            
            $lRetCode = $vCmp->Connect;
            
            /*$vItem = $vCmp->GetBusinessObject(oItems);
            
            $RetVal = $vItem->GetByKey("A1010");
            
            echo '$vItem->Itemname';
            
            */
            $lRetCode = "";
            $vCmp = "";
            return view('theme.widgets.company-fragment');
    }

}
