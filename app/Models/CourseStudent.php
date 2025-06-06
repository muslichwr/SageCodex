<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseStudent extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'is_active',
        'user_id',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }


    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
