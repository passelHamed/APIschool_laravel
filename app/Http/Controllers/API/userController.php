<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Resources\user as userResource;
use Illuminate\Support\Facades\Hash;


class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index' , 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = userResource::collection(user::all());
        return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create' , user::class);
        $user = new userResource(user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));
        return $user->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new userResource(user::findOrFail($id));
        return $user->response()->setStatusCode(200,"User Returned Succefully")
        ->header('Additional Header' , 'True');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $userId = user::findOrFail($id);
        $this->authorize('update' , $userId);
        $user = new userResource(user::findOrFail($id));
        $user->update($request->all());
        return $user->response()->setStatusCode(200 , "User Updated Succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = user::findOrFail($id);
        $this->authorize('delete' , $userId);
        user::findOrFail($id)->delete();
        return 204;
    }
}

