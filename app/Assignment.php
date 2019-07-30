<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function employment()
    {
        return $this->belongsTo(Employment::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function leaves()
    {
        return $this->belongsToMany(Leave::class);
    }
}
