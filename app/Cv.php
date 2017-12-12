<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    public function trainer() {
        return $this->hasOne('Petro\Trainer');
    }
}
