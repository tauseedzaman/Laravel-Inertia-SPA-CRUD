<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class studentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray([
            'id' => $this->id,
            'name' => $this->name,
            'city' => $this->city,
            'rollno' => $this->rollno,
            'class' => $this->classs,
            'created_at' => $this->created_at->diffForHumans(),
        ]);
    }
}
