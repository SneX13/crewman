<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

}
