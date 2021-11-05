<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturePeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'subjectPP_id',
        'classroom_id',
        'day',
        'hours',
        'week',
        'comment'
    ];

    public function subjectPP(){
        return $this->belongsTo(SubjectPP::class, 'subjectPP_id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    //filter
   /* function getLecture(){
        return $this->hasMany(SubjectPP::class, 'course');
    }*/

   /* public function scopeSearch($query, $term){
        $term = "%term%";
        $query->where(function($query) use ($term){
                $query->where('course', 'like', $term);
        });
    }*/


}
