<?php

namespace App\Http\Controllers;

use App\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json( Employe::all(), 200, [], JSON_UNESCAPED_UNICODE);
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
        $emp=new Employe();
        $emp->Name=$request->Name;
        $emp->Prenom=$request->Prenom;
        $emp->Salaire=$request->Salaire;
        $emp->save();
        return Response::json( $emp, 200, [], JSON_UNESCAPED_UNICODE);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_emp)
    {
        $emp=Employe::find($Id_emp);
        if(is_null($emp)) {
            return Response::json( ['message' => 'Employe not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        return Response::json( $emp, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employe $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $emp=Employe::find($request->Id_emp);
        if(is_null($emp)) {
            return Response::json( ['message' => 'Employe not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $emp->Name=$request->Name;
        $emp->Prenom=$request->Prenom;
        $emp->Salaire=$request->Salaire;
        $emp->save();
        return Response::json( $emp, 200, [], JSON_UNESCAPED_UNICODE);

    }

    public function destroy($Id_emp)
    {
        $emp=Employe::find($Id_emp);
        if(is_null($emp)) {
            return Response::json( ['message' => 'Employe not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $emp->delete();
        return Response::json( "Employe  deleted with success", 200, [], JSON_UNESCAPED_UNICODE);
    }
}
