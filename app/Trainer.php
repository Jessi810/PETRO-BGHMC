<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name', 'type', 'expertise', 'agency_name',
    ];

    public function cv() {
        return $this->hasOne('App\Cv');
    }

    public function educations() {
        return $this->hasMany(Education::class);
    }
}
