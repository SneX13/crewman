<?php

namespace App\Http\Resources;

use App\Assignment;
use App\Employer;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class EmployeesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }

}
