<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name',
    ];

    public function subDivisions() {
        return $this->hasMany(SubDivision::class);
    }
}
