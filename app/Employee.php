<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function employment()
    {
        return $this->hasMany(Employment::class);
    }

    public function assignments()
    {
        return $this->hasManyThrough(Assignment::class, Employment::class)->with('employer', 'locations', 'roles', 'leaves');
    }

}
