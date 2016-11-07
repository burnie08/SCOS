<?php

namespace App\SwimAdmin;

use Illuminate\Database\Eloquent\Model;

class SkillCard extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'skill_cards';

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
    protected $fillable = ['skill_id', 'name', 'short_name'];

    public function skills()
    {
        return $this->hasMany('\App\SwimAdmin\Skill');
    }
}
