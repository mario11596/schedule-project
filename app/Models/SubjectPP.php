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
        'hours'
    ];

    public function lecturePeriods(){
        return $this->hasMany(LecturePeriod::class, 'lecturePeriod_id');
    }


}
