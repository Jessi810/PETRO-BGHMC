<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name', 'type', 'expertise', 'agency_name', 'current_position',
        'address', 'mobile', 'phone', 'about', 'email',
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
    
    public function skills() {
        return $this->hasMany(Skill::class);
    }
    
    public function expertises() {
        return $this->hasMany(Expertise::class);
    }
}
