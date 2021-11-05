<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectPP extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course',
        'semester',
        'hours',
        'current_hours'
    ];

    public function lecturePeriods(){
        return $this->hasMany(LecturePeriod::class, 'lecturePeriod_id');
    }

        //za filter
    public function lecturePeriodsFilter(){
        return $this->hasMany(LecturePeriod::class, 'course');
    }


}
