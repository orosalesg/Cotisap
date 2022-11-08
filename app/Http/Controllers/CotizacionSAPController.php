<?php

namespace App\Http\Controllers;

use DateTime;
Use App\Models\User;
use DB;
use Auth;
use App\Models\Spec as Spec;
use App\Models\SpecsType as SpecsType;
use App\Models\Payment;
use App\Models\Customers as Clientes;
use App\Lib\Libraries as Lib;
use App\Models\ArtQuotation as Articulo;
use App\Models\Quotation as Cotizacion;
use App\Models\Notes as Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CotizacionSAPController extends Controller
{

	/**
	 *
	 * API SAP
	 */

    public function getToken($host, $user, $pass){

        $http = new \GuzzleHttp\Client;

        $response = $http->post($host.'/token', [
            'form_params' => [
                'grant_type' => 'password',
                'username' => $user,
                'password' => $pass,
                'scope' => ''
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function AuthToken(){
    
                $dataToken = self::getToken(
                    session('HOST_SAP_API'),
                    session('USER_SAP_API'),
                    session('PASS_SAP_API')
                );

                session(['access_token' => $dataToken]);

    	return $dataToken;           
    }

    /**
     *
     * Validate Quotation
     */


	public function validateQuotation(Request $Request){

		$data = array();

		array_push($data,['CardCode' => Lib::querySQLSRV("
			IF(
 				SELECT count(*) FROM OCRD WHERE VatStatus = 'Y' AND CardType = 'C' AND ( CardCode LIKE ? OR CardName LIKE ? )
			) > 0
    			SELECT  0 as status
			ELSE 
    			SELECT  1 as status", [ $Request->q, $Request->q ])]);

		$Products = array();

		if(!empty($Request->r)){
			foreach ($Request->r as $prodK => $prodV) {
				
				array_push($Products,
					Lib::querySQLSRV("
					IF (
						SELECT count(*) FROM OITM WHERE  ItemCode = ?
					) > 0
    					SELECT  0 as status, ? as ItemCode 
					ELSE 
    					SELECT  1 as status, ? as ItemCode",[$prodV, $prodV, $prodV ])
				);
			}
		}

		


		array_push($data,[
				'Products' => 	$Products	
		]);

		return response()->json([ 
            "status" => "true",
            "data" => $data
        ]);

	}



    
}
