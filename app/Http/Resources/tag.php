<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\lesson as lessonResource;
use App\Http\Resources\user as userResource;

class tag extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Name' => $this->name,
            // 'lessons'   => lessonResource::collection($this->lessons),
        ];
    }
}
