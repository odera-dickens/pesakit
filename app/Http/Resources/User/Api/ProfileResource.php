<?php

namespace App\Http\Resources\User\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'date_of_joining' => Carbon::parse($this->updated_at)->format('d/m/Y')
        ];
    }
}
