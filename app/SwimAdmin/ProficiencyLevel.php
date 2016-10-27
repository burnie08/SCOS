<?php

namespace App\SwimAdmin;

use Illuminate\Database\Eloquent\Model;

class ProficiencyLevel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proficiency_levels';

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
    protected $fillable = ['name', 'short_name'];

    
}
