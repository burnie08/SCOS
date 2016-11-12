<?php

namespace App\Instructors;

use Illuminate\Database\Eloquent\Model;

class EvalClass extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evals';

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
    protected $fillable = ['lesson_id', 'skill_id', 'skill_level_id'];

    public function skill()
    {
        return $this->belongsTo('App\SwimAdmin\Skill','skill_id');
    }
    
    
}
