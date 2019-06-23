<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cpf', 'birthday', 'email', 'phone', 'course_id', 'period',        
    ];

    protected $dates = ['birthday'];

    public function course()
    {
        return $this->hasOne('App\Course', 'id', 'course_id');
    }
}
