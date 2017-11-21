<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    public function trainer() {
        return $this->hasOne('App\Trainer');
    }
}
