<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function subdivisions() {
        return $this->hasMany(Subdivision::class);
    }
}
