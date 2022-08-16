<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Http\Resources\user as userResource;

class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic.once');
    }

    public function login()
    {
        $AccessToken = Auth::user()->createToken('Access Token')->accessToken;
        return Response(['user' => new userResource(Auth::user()) , 'Access Token' => $AccessToken]);
    }
}
