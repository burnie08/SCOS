<?php

namespace App\SwimAdmin;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'skills';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['skill_card_id', 'name'];

    public function skillcard()
    {
        return $this->hasMany('\App\SwimAdmin\SkillCard');
    }
}
