<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
