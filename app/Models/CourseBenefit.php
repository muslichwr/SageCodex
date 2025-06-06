<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseBenefit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'course_id',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
