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
use App\Models\PuntosMbr as Puntos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class PuntosMbrController extends Controller
{


    /*
     * Controladores para puntos mbr
     */

    /**
     *
     * @param void
     * @return view
     */

    public function index(){

		return view('theme.puntosmbr.registrar');
	}

    public function savepoints(Request $request){
        
        //  Creamos una nueva variable para guardar la informacion 
        //  del registro de venta para los puntos mbr
        $puntos = new Puntos();
        
        $puntos->id_customer = $request->id_customer ? $request->id_customer : '' ;
        $puntos->from_sap = $request->from_sap ? $request->from_sap : '' ;
        $puntos->descript = $request->descript ? $request->descript : '' ;
        $puntos->sale_type = $request->sale_type ? $request->sale_type : '' ;
        $puntos->qty = $request->qty ? $request->qty : '' ;
        $puntos->qty_mxn = $request->qty_mxn ? $request->qty_mxn : '' ;
        $puntos->created_at = new DateTime();
        $puntos->updated_at = new DateTime();
        
        return response()->json([ 
            'status' => $puntos->save() === true ? "true" : "false"
        ]);
        /*return response()->json([ 
        'status' => " regreso de save points",
        'datos' => $request
        ]);*/
    }
}
