<?php

namespace App\Http\Controllers;

use App\Models\CntctPerson;
use Illuminate\Http\Request;

class CntctPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verificar que el nombre este definido
        if(!isset($request->name))
            return response()->json([
                "status" => false,
                "msg" => "Debe de ingresar un nombre"
            ]);

        // Crear nuevo obj con el modelo CntctPerson
        $cp = new CntctPerson();

        // Llenar los campos 
        $cp->id_customer = $request->id_customer;
        $cp->name = $request->name;
        $cp->email = isset($request->email) ? $request->email : "";
        $cp->phone = isset($request->phone) ? $request->phone : "";

        // Respuesta a la solicitud
        return response()->json([
            "status" => $cp->save() === true ? true : false,
            "cp" => $cp
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CntctPerson  $cntctPerson
     * @return \Illuminate\Http\Response
     */
    public function show(CntctPerson $cntctPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CntctPerson  $cntctPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(CntctPerson $cntctPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CntctPerson  $cntctPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if(!isset($request->name))
            return response()->json([
                "status" => false,
                "msg" => "Debe de ingresar un nombre"
            ]);

        $cp = CntctPerson::find($request->id);

        // Llenar los campos 
        $cp->name = $request->name;
        $cp->email = isset($request->email) ? $request->email : "";
        $cp->phone = isset($request->phone) ? $request->phone : "";

        // Respuesta a la solicitud
        return response()->json([
            "status" => $cp->save() === true ? true : false,
            "cp" => $cp
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CntctPerson  $cntctPerson
     * @return \Illuminate\Http\Response
     */
    //public function destroy(CntctPerson $cntctPerson)
    public function destroy(Request $request)
    {
        //

        $cp = CntctPerson::find($request->id);

        return response()->json([
            "status" => $cp->delete() === true ? true : false,
        ]);
    }

    public function findwhere(Request $request){

        $cp = CntctPerson::where('id_customer',$request->id_customer)->get();

        if(isset($request->coti)){

            $results = array();
            $i = 0;

            foreach($cp as $person){
                $results[$i]["id"] = $person->id;
                $results[$i]["text"] = $person->name;

                $i++;
            }

            return response()->json($results);

        }

        return response()->json($cp);

    }

    public function findsingleCP(Request $request){

        $cp = CntctPerson::find($request->q);

        if(!$cp){
            return response()->json([
                "msg" => "Sin datos"
            ], 400);
        }

        return response()->json($cp);

    }

    public static function insfindCntctPpl($id){

        $cp = CntctPerson::where('id_customer',$id)->get();

        return $cp;

    }

    public static function insfindsingleCP($id){

        $cp = CntctPerson::find($id);

        return $cp;

    }
}
