<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'topic', 'date', 'agency_name',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
