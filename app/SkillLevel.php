<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class SkillLevel extends Model
{
    public function skills()
    {
       return $this->hasMany(Skill::class);
    }
}
