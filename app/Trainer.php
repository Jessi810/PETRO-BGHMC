<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name', 'type', 'agency_name', 'current_position',
        'address', 'mobile', 'phone', 'about', 'email',
        'division', 'sub_division',
    ];

    public function cv() {
        return $this->hasOne('Petro\Cv');
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
    
    public function training() {
        return $this->hasMany(Training::class);
    }
    
    public function subDivision() {
        return $this->hasOne(SubDivision::class);
    }
}
