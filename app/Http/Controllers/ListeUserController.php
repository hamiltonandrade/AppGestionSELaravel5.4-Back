<?php

namespace App\Http\Controllers;

use App\Usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ListeUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Response::json( Usermodel::all(), 200, [], JSON_UNESCAPED_UNICODE);

    }

}
