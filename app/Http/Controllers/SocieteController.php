<?php

namespace App\Http\Controllers;

use App\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json( Societe::all(), 200, [], JSON_UNESCAPED_UNICODE);
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
        $soc=new Societe();
        $soc->Name=$request->Name;
        $soc->Logo=$request->Logo;
        $soc->Adresse=$request->Adresse;
        $soc->save();
        return Response::json( $soc, 200, [], JSON_UNESCAPED_UNICODE);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_soc)
    {
        $soc=Societe::find($Id_soc);
        if(is_null($soc)) {
            return Response::json( ['message' => 'Société not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        return Response::json( $soc, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Societe $societe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $soc=Societe::find($request->Id_soc);
        if(is_null($soc)) {
            return Response::json( ['message' => 'Société not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $soc->Name=$request->Name;
        $soc->Logo=$request->Logo;
        $soc->Adresse=$request->Adresse;
        $soc->save();
        return Response::json( $soc, 200, [], JSON_UNESCAPED_UNICODE);

    }


    public function destroy($Id_soc)
    {
        $soc=Societe::find($Id_soc);
        if(is_null($soc)) {
            return Response::json( ['message' => 'Société not found'], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $soc->delete();
        return Response::json( "Société  supprimer with success", 200, [], JSON_UNESCAPED_UNICODE);
    }
}
