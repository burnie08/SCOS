<?php

namespace App\Instructors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Swimmer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'swimmers';

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
    protected $fillable = ['first_name', 'last_name'];

    public static function lastNamesLike($last_name)
    {
       return Swimmer::orderBy('last_name')->orderBy('first_name')->where('last_name', 'like', $last_name.'%')
        ->get();
    }
    /**
    * Gets distinct skill cards for a swimmer based on lessons
    *
    **/
    public function getSkillCardsAttribute()
    {
         return DB::table('skill_cards')
             ->join('lessons', 'skill_cards.id', '=', 'lessons.skill_card_id')
             ->select('lessons.skill_card_id',  'skill_cards.name')
             ->where('lessons.swimmer_id','=',$this->id)
             ->distinct()->get();
         //return $this->belongsTo('\App\Instructors\lesson','id','swimmer_id');
    }
    
    public function skills($skill_card_id)
    {
         return DB::table('skills')->orderBy('name')
             ->select('id', 'name')
             ->where('skills.skill_card_id','=',$skill_card_id)
             ->get();
             
             
         //return $this->belongsTo('\App\Instructors\lesson','id','swimmer_id');
    }
    
    // get evals sorted by lesson_date
    public function evals($skill_id)
    {
        
        return DB::table('evals')
            ->orderBy('lessons.lesson_date')
            ->join('lessons', 'lessons.id', '=', 'evals.lesson_id')
            ->join('skill_levels', 'skill_levels.id', '=', 'evals.skill_level_id')
            ->select('evals.skill_level_id', 'lessons.lesson_date','evals.lesson_id', 'skill_levels.name')
            ->where('lessons.swimmer_id','=',$this->id)
            ->where('evals.skill_id','=',$skill_id)->get();
    }
    /**
    * Gets the last time the student attended class.
    *
    **/
    public function lessons()
    {
         return $this->belongsTo('\App\Instructors\lesson','id','swimmer_id');
    }
    public function getLastAttendedAttribute() {
        
        $max_lesson_date = $this->lessons()->max('lesson_date');
        if($max_lesson_date)
        {
            //dd($max_lesson_date);
            $date = \DateTime::createFromFormat("Y-m-d", $max_lesson_date);
            if($date)
            {
                return $date->format("m/d/y");
            }
        }     
        
        return null;
        
    }
    public function getMaxSkillCardAttribute() {
        $lessons = $this->lessons();
        if($lessons)
        {
            $max_skill_card_id = $lessons->max('skill_card_id');
            if($max_skill_card_id)
            {
                $skill_card = \App\SwimAdmin\SkillCard::find($max_skill_card_id);
                if($skill_card){return $skill_card->name;}
                
            }
            
        }
        return  null;
    }
}
