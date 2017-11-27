<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'school', 'year_graduated', 'major', 'minor',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
