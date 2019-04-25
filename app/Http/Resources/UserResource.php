<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'avatar' => ($this->avatar)? url($this->avatar) : null,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'organization' => ($this->organization) ? $this->organization->name : null,
        ];
    }
}
