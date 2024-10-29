<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {        
        return [
            "course_id" => $this->id ,
            "name" => $this->name ,
            "image" => $this->image ,
            "discriper" => $this->discriper ,
            "descrption" => $this->descrption ,
            "rated" => floor($this->recomendNum / ($request->recomendCount ?: 1)),
            "files" => $this->files()->get() ,
            "opeside" => $this->opeside()->get() ,
        ];
    }
}
