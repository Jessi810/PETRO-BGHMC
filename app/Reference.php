<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'name', 'company_name', 'position', 'mobile', 'email'
    ];

    public function trainer() {
        return $this->belongsTo(Trainer::class);
    }
}
