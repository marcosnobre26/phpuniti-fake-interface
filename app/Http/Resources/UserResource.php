<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => is_string($this->created_at) ? $this->created_at : $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => is_string($this->updated_at) ? $this->updated_at : $this->updated_at->format('Y-m-d H:i:s'),
        ];


        if (property_exists($this, 'id')) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}
