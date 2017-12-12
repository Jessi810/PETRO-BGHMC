<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'title', 'description', 'proficiency',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
