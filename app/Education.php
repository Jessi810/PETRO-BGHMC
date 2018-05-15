<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'school', 'year_graduated', 'degree', 'highlevel', 'scholar', 'yearto', 'yearfrom',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
