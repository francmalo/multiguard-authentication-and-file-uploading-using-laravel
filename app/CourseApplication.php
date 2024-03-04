<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseApplication extends Model
{


    protected $fillable = ['student_id', 'course_id', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
