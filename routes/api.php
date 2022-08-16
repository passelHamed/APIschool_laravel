<?php

use App\Http\Controllers\API\lessonController as APILessonController;
use App\Http\Controllers\API\RelationshipController as APIRelationshipController;
use App\Http\Controllers\API\userController as APIuserController;
use App\Http\Controllers\API\tagController as APItagController;
use App\Http\Controllers\API\loginController as APIloginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => '/v1'] , function(){

    Route::apiResource('lessons' , APIlessonController::class);
    Route::apiResource('users' , APIuserController::class);
    Route::apiResource('tags' , APItagController::class);

    Route::get('users/{id}/lessons' , [APIRelationshipController::class , 'userLessons']);
    Route::get('lessons/{id}/tags'  , [APIRelationshipController::class , 'lessonTags']);
    Route::get('tags/{id}/lessons'  , [APIRelationshipController::class , 'tagLessons']);
    Route::get('/login' , [APIloginController::class , 'login'])->name('login');

    // Route::redirect('lesson' , 'lessons');
    // Route::redirect('user' , 'users');
    // Route::redirect('tag' , 'tags');

    Route::any('lesson' , function(){
        $message = "please write lessons no lesson";
        return Response::json([
            'data' => $message,
            'link' => url('documentation/api')
        ] , 404);
    });

});

