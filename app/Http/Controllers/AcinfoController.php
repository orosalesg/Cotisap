<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ACinfo;
use GuzzleHttp\Client as GClient;
use Illuminate\Support\Facades\Http;

class AcinfoController extends Controller
{ 
    //Api client info = ACI
    public $authtoken = "https://developers.syscom.mx/oauth/token";
    public $BaseUri = "https://developers.syscom.mx/api/v1/";

    public function index(){        
        return view('theme.syscom.buscarprod');
    }

    public function getSyscomToken(){

        $data = ACinfo::where('site','syscom')->get();

        $request = Http::withHeaders([
            'contentType' => "application/x-www-form-urlencoded"
        ])->post($this->authtoken,[
            'client_id' => $data[0]->client_id,
            'client_secret' => $data[0]->client_secret,
            'grant_type' => "client_credentials"
        ]);

        $body = json_decode((string)$request->getBody());

        return $body->access_token;
    }

    public function searchSyscomProductos(Request $request){

        $token = self::getSyscomToken();

        $request = Http::withToken($token)->get($this->BaseUri . "productos?busqueda=" . str_replace(" ","+",$request->param) . "&todos=true" );

        $body = json_decode((string)$request->getBody());

        return $body->productos;

    }
}
