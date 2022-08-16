<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use Illuminate\Http\Request;
use App\Http\Resources\lesson as lessonResource;

class lessonController extends Controller
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
        $lesson = lessonResource::collection(lesson::all());
        return $lesson->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = new lessonResource(lesson::create($request->all()));
        return $lesson->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = new lessonResource(lesson::findOrFail($id));
        return $lesson->response()->setStatusCode(200,"lesson Returned Succefully")
        ->header('Additional Header' , 'True');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $lessonId = lesson::findOrFail($id);
        $this->authorize('update' , $lessonId);
        $lesson = new lessonResource(lesson::findOrFail($id));
        $lesson->update($request->all());
        return $lesson->response()->setStatusCode(200 , "lesson Updated Succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lessonId = lesson::findOrFail($id);
        $this->authorize('delete' , $lessonId);
        lesson::findOrFail($id)->delete();
        return 204;
    }
}
