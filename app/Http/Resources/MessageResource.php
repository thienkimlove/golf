<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'send_user_name' => $this->send_user->name,
            'receiver_user_name' => $this->send_user->name,
            'text_message' => $this->text_message,
            'image_link' => $this->image_link,
            'video_link' => $this->video_link,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
