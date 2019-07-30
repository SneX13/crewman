<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }
}
