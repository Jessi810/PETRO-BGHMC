<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $fillable = [
        'title', 'description',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
