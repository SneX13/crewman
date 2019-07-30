<?php

namespace App\Http\Resources;

use App\Assignment;
use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'id_number' => $this->id_number,
            'employment' => $this->employment,
            'assignments' => $this->assignments,
        ];
    }
}
