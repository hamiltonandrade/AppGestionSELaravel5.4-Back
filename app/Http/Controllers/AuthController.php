<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Requests\RegisterFormRequest;
use App\Usermodel;

class AuthController extends Controller
{

    /**
     * @var JWTAuth
     */
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }


    public function register(Request $request)
    {

        $user = User::where('email', $request['email'])->first();
        if ($user) {
            $respose['status'] = 401;
            $respose['message'] = 'Email deja existant';
            return response()->json($respose);

        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            if ($user) {
                return response([
                    'status' => '200',
                    'message' => 'Register successful',
                    'data' => $user
                ], 200);

            }
        }

    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = $this->jwtAuth->attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials', 'message' => 'Email or password est incorrecte'], 401);
        }

        $user = $this->jwtAuth->authenticate($token);
        $status = 200;
        $message='Login successful';
        return response()->json(compact('token', 'user', 'status', 'message'));
    }

    public function refresh()
    {
        $token = $this->jwtAuth->getToken();
        $token = $this->jwtAuth->refresh($token);

        return response()->json(compact('token'));
    }

    public function logout()
    {
        $token = $this->jwtAuth->getToken();
        $this->jwtAuth->invalidate($token);

        return response()->json(['logout']);
    }

    public function me()
    {
        if (!$user = $this->jwtAuth->parseToken()->authenticate()) {
            return response()->json(['error' => 'user_not_found'], 404);
        }

        return response()->json(compact('user'));
    }
}
