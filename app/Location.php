<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function assignments()
    {
        return $this->belongsToMany(Assignment::class);
    }
}
