<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'company_name', 'position', 'datefrom', 'dateto', 'description',
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
