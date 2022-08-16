<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\lesson;
use App\Models\tag;
use Illuminate\Support\Facades\Response;

class RelationshipController extends Controller
{
    public function userLessons($id)
    {
        $user = User::findOrFail($id)->lessons;

        return response::json([
            'data' => $user->toArray()
        ] , 200);
    }

    public function tagLessons($id)
    {
        $tag = tag::findOrFail($id)->lessons;
        return Response::json([
            'data' => $tag->toArray()
        ] , 200);
    }
    
    public function lessonTags($id)
    {        
        $lesson = lesson::findOrFail($id)->tags;
        return response::json([
            'data' => $lesson->toArray()
        ] , 200);
    }
}
