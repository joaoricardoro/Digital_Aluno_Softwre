<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

}
