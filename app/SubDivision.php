<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class SubDivision extends Model
{
    protected $fillable = [
        'name',
    ];

    public function division() {
        return $this->belongsTo(Division::class);
    }
    
    public function trainer() {
        return $this->hasOne(Trainer::class);
    }
}
