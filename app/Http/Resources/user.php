<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\lesson as lessonResource;
use App\Http\Resources\tag as tagResource;

class user extends JsonResource
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
            'Full Name' => $this->name,
            'E-Mail'    => $this->email,
            'lessons'   => lessonResource::collection($this->lessons),
        ];
    }
}
