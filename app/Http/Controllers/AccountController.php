<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Libraries as Lib;
use App\Models\UserPrueba as User;

class AccountController extends Controller
{
    //
    public function index(){
    	return View('theme.administracion.profile');
    }
    
    public function getInfo(Request $request){
        $user = User::where(
            'email',
            $request->email
        )->get();
        
        return response()->json([
    		'general_info' => $user
    	]);
    	
    	/*$info = Lib::querySQLSRV("SELECT A.*, B.SlpName AS Gerente FROM 
				(
					SELECT SlpName, SlpCode, Commission, ISNULL(Telephone, 'N/A') AS Telephone, ISNULL(Email, 'N/A') AS Email, 
					(CASE 
						WHEN U_manager = '0' THEN SlpCode 
						WHEN U_manager IS NULL THEN SlpCode 
						ELSE U_manager END) AS 'ManagerCode' 
					FROM OSLP
					WHERE Email = ?
				) A, OSLP B
				WHERE A.ManagerCode = B.SlpCode", [$request->email]);
    	return response()->json([
    		'general_info' => $info
    	]);*/
    	
    }
    
    public function updateUser(Request $request){
        $user = User::find($request->id);
            
        $user->password = bcrypt($request->password);
        
        return response()->json([
            'status' => $user->save()
        ]);
    }
}
