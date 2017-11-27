<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'title', 'description', 'date',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
