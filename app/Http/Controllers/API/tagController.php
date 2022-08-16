<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;
use App\Http\Resources\tag as tagResource;
use App\Models\User;

class tagController extends Controller
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
        $tag = tagResource::collection(tag::all());
        return $tag->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create' , tag::class);
        $tag = new tagResource(tag::create($request->all()));
        return $tag->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = new tagResource(tag::findOrFail($id));
        return $tag->response()->setStatusCode(200,"tag Returned Succefully")
        ->header('Additional Header' , 'True');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tagId = tag::findOrFail($id);
        $this->authorize('update' , $tagId);
        $tag = new tagResource(tag::findOrFail($id));
        $tag->update($request->all());
        return $tag->response()->setStatusCode(200 , "tag Updated Succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tagId = tag::findOrFail($id);
        $this->authorize('delete' , $tagId);
        tag::findOrFail($id)->delete();
        return 204;
    }
}
