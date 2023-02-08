<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id' => $this->id,
            'us_email' => $this->us_email,
            'us_phone' => $this->us_phone,
            'us_associ_number' => $this->us_associ_number,
            'us_password' => $this->us_password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
