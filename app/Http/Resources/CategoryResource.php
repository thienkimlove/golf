<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'parent_name' => ($this->parent) ? $this->parent->name : null,
            'status' => $this->status,
        ];
    }
}
