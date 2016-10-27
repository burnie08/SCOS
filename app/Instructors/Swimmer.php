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

    
}
