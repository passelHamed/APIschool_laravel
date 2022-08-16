<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\user as userResource;
use App\Http\Resources\tag as tagResource;
use App\Http\Resources\lesson as lessonResource;

class lesson extends JsonResource
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
            'Author'  => $this->user->name,
            'Title'   => $this->title,
            'Content' => $this->body,
            // 'Tags'    => tagResource::collection($this->tags),
        ];
    }
}
