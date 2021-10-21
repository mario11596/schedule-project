<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\LecturePeriod;
use App\Models\SubjectPP;
use Livewire\Component;

class TimeSubject extends Component
{
    public $day;
    public $hours;
    public $timetable = [
        'classrooms',
        'subjectPPs',
        'comments' => '',
    ];

    protected $rules = [
        'timetable.classrooms' => 'required',
        'timetable.subjectPPs' => 'required',
       
        'timetable.comments',
    ];

   /*public $classrooms; 
    public $subjectPPs;
    public $comments = ' ';*/

    public function mount(){
        $this->classrooms = Classroom::all();
        $this->subjectPPs = SubjectPP::all();


      
    }

    public function render()
    {
         //ovdje uhvatiti cijelu bazu
        return view('livewire.time-subject');
    }

    public function submit(){

        /*$this->validate([
            'classrooms' => 'required',
            'subjectPPs' => 'required',
            'comments' => 'required'
        ]);*/
       //$this->validate('timetable');

        //$find_id = Classroom::where('name', "=", $classrooms)->pluck('id')->first();

        LecturePeriod::create([
            'classroom_id' => $this->timetable['classrooms'],
            'subjectPP_id' => $this->timetable['subjectPPs'],
            'comment' => $this->timetable['comments'],
            'day' => $this->day,
            'hours' => $this->hours,
            'week' => '3'
        ]);
        
        $hours_duration = SubjectPP::where('id',$this->timetable['subjectPPs'])->first();
        $duration = ($hours_duration->hours) - 1;
        $hours_duration->hours = $duration;
        $hours_duration->save();
       
        $this->reset('timetable');

        session()->flash('success','Uspješno spremljen termin!');
    }
}
