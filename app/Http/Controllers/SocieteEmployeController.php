<?php

namespace App\Http\Controllers;

use App\Semp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SocieteEmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json( Semp::all(), 200, [], JSON_UNESCAPED_UNICODE);
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
        $semp=new Semp();
        $semp->id_emp=$request->id_emp;
        $semp->id_soc=$request->id_soc;
        $semp->save();
        if(!$semp) {
        return Response::json( ['message' => 'Imposible enregristrer'], 404, [], JSON_UNESCAPED_UNICODE);
    }
         return Response::json( $semp, 200, [], JSON_UNESCAPED_UNICODE);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semp  $semp
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_semp)
    {
        $semp=Semp::find($Id_semp);
        return Response::json(  $semp, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semp $semp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $semp=Semp::find($request->Id_semp);
        if(is_null($semp)) {
            return Response::json( ['message' => 'Société & Employé not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $semp->id_emp=$request->id_emp;
        $semp->id_soc=$request->id_soc;
        $semp->save();
        return Response::json( $semp, 200, [], JSON_UNESCAPED_UNICODE);

    }


    public function destroy($Id_semp)
    {
        $semp=Semp::find($Id_semp);
        if(is_null($semp)) {
            return Response::json( ['message' => 'Société & Employé not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $semp->delete();
        return Response::json( " Table Societe & Employe supprimer with success", 200, [], JSON_UNESCAPED_UNICODE);
    }
}
