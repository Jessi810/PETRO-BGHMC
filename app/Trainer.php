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
    
    public function works() {
        return $this->hasMany(Work::class);
    }
    
    public function certifications() {
        return $this->hasMany(Certification::class);
    }

    public function references() {
        return $this->hasMany(Reference::class);
    }
}
