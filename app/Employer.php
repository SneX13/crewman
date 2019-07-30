<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    public function assignment()
    {
        return $this->hasMany(Assignment::class); //not defined, assuming it has many
    }


}
