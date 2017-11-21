<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name',
    ];

    public function cv() {
        return $this->hasOne('App\Cv');
    }
}
