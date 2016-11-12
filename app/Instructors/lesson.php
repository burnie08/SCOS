<?php

namespace App\Instructors;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lessons';

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
    protected $fillable = ['user_id', 'swimmer_id', 'skill_card_id', 'comments','lesson_date', 'isComplete'];

    
    public function skillcard()
    {
        return $this->belongsTo('App\SwimAdmin\SkillCard','skill_card_id');
    }
    public function instructor()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function evals()
    {
        return $this->hasMany('\App\Instructors\EvalClass','lesson_id');
    }
    public function swimmer()
    {
        return $this->belongsTo('App\Instructors\Swimmer','swimmer_id');
    }
}
