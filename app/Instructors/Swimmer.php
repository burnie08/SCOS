<?php

namespace App\Instructors;

use Illuminate\Database\Eloquent\Model;

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
    * Gets the highest skill card the student has completed
    *
    **/
    public function skillCards()
    {
         return $this->belongsTo('\App\Instructors\lesson','id','swimmer_id');
        
         //$skill_card_id = $this->belongsTo('\App\Instructors\lesson','id','swimmer_id')->max('skill_card_id');
         //dd($skill_card_id);
         //$skill_card = \App\SwimAdmin\SkillCard::find($skill_card_id);
        //return $skill_card->name;
        //return $skill_card;
    }
    
    /**
    * Gets the last time the student attended class.
    *
    **/
    public function lessons()
    {
         return $max_lesson_date = $this->belongsTo('\App\Instructors\lesson','id','swimmer_id');
         //$max_lesson_date = $this->belongsTo('\App\Instructors\lesson','id','swimmer_id')->max('lesson_date');
         
        //return $max_lesson_date;
        //return null;
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
        $skill_cards = $this->skillCards();
        if($skill_cards)
        {
            $max_skill_card_id = $skill_cards->max('skill_card_id');
            if($max_skill_card_id)
            {
                $skill_card = \App\SwimAdmin\SkillCard::find($max_skill_card_id);
                if($skill_card){return $skill_card->name;}
                
            }
            
        }
        return  null;
    }
}
