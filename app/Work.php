<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'company_name', 'position', 'yearfrom', 'yearto',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
