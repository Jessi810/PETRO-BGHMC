<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function trainers() {
        return $this->hasMany(Trainer::class);
    }
    
    public function division() {
        return $this->belongsTo(Division::class);
    }
}
