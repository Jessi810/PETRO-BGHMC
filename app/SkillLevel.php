<?php

namespace Petro;

use Illuminate\Database\Eloquent\Model;

class SkillLevel extends Model
{
    protected $fillable = [
        'name', 'description', 'level',
    ];

    public function skills()
    {
       return $this->hasMany(Skill::class);
    }
}
