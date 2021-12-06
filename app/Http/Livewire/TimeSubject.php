<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\LecturePeriod;
use App\Models\SubjectPP;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Request as LivewireRequest;
use Illuminate\Support\Str;


class TimeSubject extends Component
{   
    public $param1;
    public $param2;
    public $day;
    public $hours;
    public $lecturePeriods;
    public $timeRange;
    public $weekDays; 
   
    /*public $timetable = [
        'classrooms',
        'subjectPPs',
        'comments'
    ];*/

    //varijable za opći prikaz
    public $classrooms;
    public $classroom1;
    public $subjectPPs;
    public $subjectPP1;
    public $comment1;

    public $classroom;
    public $subjectPP;
    public $comment;

    //varijable za update
    public $data;
    public $data_id;
    public $updateSubject;
    public $updateClassroom;
    public $updateComment;
    public $updateDay;
    public $updateHours;

    protected $rules = [
        'timetable.classrooms' => 'required',
        'timetable.subjectPPs' => 'required', 
        'timetable.comments',
    ];

    //ponedjeljak
    public $kolegij_pon_8;
    public $ucionica_pon_8;
    public $komentar_pon_8;

    public $kolegij_pon_9;
    public $ucionica_pon_9;
    public $komentar_pon_9;

    public $kolegij_pon_10;
    public $ucionica_pon_10;
    public $komentar_pon_10;

    public $kolegij_pon_11;
    public $ucionica_pon_11;
    public $komentar_pon_11;

    public $kolegij_pon_12;
    public $ucionica_pon_12;
    public $komentar_pon_12;

    public $kolegij_pon_13;
    public $ucionica_pon_13;
    public $komentar_pon_13;

    public $kolegij_pon_14;
    public $ucionica_pon_14;
    public $komentar_pon_14;

    public $kolegij_pon_15;
    public $ucionica_pon_15;
    public $komentar_pon_15;

    public $kolegij_pon_16;
    public $ucionica_pon_16;
    public $komentar_pon_16;

    public $kolegij_pon_17;
    public $ucionica_pon_17;
    public $komentar_pon_17;

    public $kolegij_pon_18;
    public $ucionica_pon_18;
    public $komentar_pon_18;

    public $kolegij_pon_19;
    public $ucionica_pon_19;
    public $komentar_pon_19;

    public $kolegij_pon_20;
    public $ucionica_pon_20;
    public $komentar_pon_20;

    public $kolegij_pon_21;
    public $ucionica_pon_21;
    public $komentar_pon_21;


    //utorak
    public $kolegij_uto_8;
    public $ucionica_uto_8;
    public $komentar_uto_8;

    public $kolegij_uto_9;
    public $ucionica_uto_9;
    public $komentar_uto_9;

    public $kolegij_uto_10;
    public $ucionica_uto_10;
    public $komentar_uto_10;

    public $kolegij_uto_11;
    public $ucionica_uto_11;
    public $komentar_uto_11;

    public $kolegij_uto_12;
    public $ucionica_uto_12;
    public $komentar_uto_12;

    public $kolegij_uto_13;
    public $ucionica_uto_13;
    public $komentar_uto_13;

    public $kolegij_uto_14;
    public $ucionica_uto_14;
    public $komentar_uto_14;

    public $kolegij_uto_15;
    public $ucionica_uto_15;
    public $komentar_uto_15;

    public $kolegij_uto_16;
    public $ucionica_uto_16;
    public $komentar_uto_16;

    public $kolegij_uto_17;
    public $ucionica_uto_17;
    public $komentar_uto_17;

    public $kolegij_uto_18;
    public $ucionica_uto_18;
    public $komentar_uto_18;

    public $kolegij_uto_19;
    public $ucionica_uto_19;
    public $komentar_uto_19;

    public $kolegij_uto_20;
    public $ucionica_uto_20;
    public $komentar_uto_20;

    public $kolegij_uto_21;
    public $ucionica_uto_21;
    public $komentar_uto_21;


    //srijeda
    public $kolegij_sri_8;
    public $ucionica_sri_8;
    public $komentar_sri_8;

    public $kolegij_sri_9;
    public $ucionica_sri_9;
    public $komentar_sri_9;

    public $kolegij_sri_10;
    public $ucionica_sri_10;
    public $komentar_sri_10;

    public $kolegij_sri_11;
    public $ucionica_sri_11;
    public $komentar_sri_11;

    public $kolegij_sri_12;
    public $ucionica_sri_12;
    public $komentar_sri_12;

    public $kolegij_sri_13;
    public $ucionica_sri_13;
    public $komentar_sri_13;

    public $kolegij_sri_14;
    public $ucionica_sri_14;
    public $komentar_sri_14;

    public $kolegij_sri_15;
    public $ucionica_sri_15;
    public $komentar_sri_15;

    public $kolegij_sri_16;
    public $ucionica_sri_16;
    public $komentar_sri_16;

    public $kolegij_sri_17;
    public $ucionica_sri_17;
    public $komentar_sri_17;

    public $kolegij_sri_18;
    public $ucionica_sri_18;
    public $komentar_sri_18;

    public $kolegij_sri_19;
    public $ucionica_sri_19;
    public $komentar_sri_19;

    public $kolegij_sri_20;
    public $ucionica_sri_20;
    public $komentar_sri_20;

    public $kolegij_sri_21;
    public $ucionica_sri_21;
    public $komentar_sri_21;

    //cetvrtak
    public $kolegij_cet_8;
    public $ucionica_cet_8;
    public $komentar_cet_8;

    public $kolegij_cet_9;
    public $ucionica_cet_9;
    public $komentar_cet_9;

    public $kolegij_cet_10;
    public $ucionica_cet_10;
    public $komentar_cet_10;

    public $kolegij_cet_11;
    public $ucionica_cet_11;
    public $komentar_cet_11;

    public $kolegij_cet_12;
    public $ucionica_cet_12;
    public $komentar_cet_12;

    public $kolegij_cet_13;
    public $ucionica_cet_13;
    public $komentar_cet_13;

    public $kolegij_cet_14;
    public $ucionica_cet_14;
    public $komentar_cet_14;

    public $kolegij_cet_15;
    public $ucionica_cet_15;
    public $komentar_cet_15;

    public $kolegij_cet_16;
    public $ucionica_cet_16;
    public $komentar_cet_16;

    public $kolegij_cet_17;
    public $ucionica_cet_17;
    public $komentar_cet_17;

    public $kolegij_cet_18;
    public $ucionica_cet_18;
    public $komentar_cet_18;

    public $kolegij_cet_19;
    public $ucionica_cet_19;
    public $komentar_cet_19;

    public $kolegij_cet_20;
    public $ucionica_cet_20;
    public $komentar_cet_20;

    public $kolegij_cet_21;
    public $ucionica_cet_21;
    public $komentar_cet_21;

    //petak
    public $kolegij_pet_8;
    public $ucionica_pet_8;
    public $komentar_pet_8;

    public $kolegij_pet_9;
    public $ucionica_pet_9;
    public $komentar_pet_9;

    public $kolegij_pet_10;
    public $ucionica_pet_10;
    public $komentar_pet_10;

    public $kolegij_pet_11;
    public $ucionica_pet_11;
    public $komentar_pet_11;

    public $kolegij_pet_12;
    public $ucionica_pet_12;
    public $komentar_pet_12;

    public $kolegij_pet_13;
    public $ucionica_pet_13;
    public $komentar_pet_13;

    public $kolegij_pet_14;
    public $ucionica_pet_14;
    public $komentar_pet_14;

    public $kolegij_pet_15;
    public $ucionica_pet_15;
    public $komentar_pet_15;

    public $kolegij_pet_16;
    public $ucionica_pet_16;
    public $komentar_pet_16;

    public $kolegij_pet_17;
    public $ucionica_pet_17;
    public $komentar_pet_17;

    public $kolegij_pet_18;
    public $ucionica_pet_18;
    public $komentar_pet_18;

    public $kolegij_pet_19;
    public $ucionica_pet_19;
    public $komentar_pet_19;

    public $kolegij_pet_20;
    public $ucionica_pet_20;
    public $komentar_pet_20;

    public $kolegij_pet_21;
    public $ucionica_pet_21;
    public $komentar_pet_21;

    //subota
    public $kolegij_sub_8;
    public $ucionica_sub_8;
    public $komentar_sub_8;

    public $kolegij_sub_9;
    public $ucionica_sub_9;
    public $komentar_sub_9;

    public $kolegij_sub_10;
    public $ucionica_sub_10;
    public $komentar_sub_10;

    public $kolegij_sub_11;
    public $ucionica_sub_11;
    public $komentar_sub_11;

    public $kolegij_sub_12;
    public $ucionica_sub_12;
    public $komentar_sub_12;

    public $kolegij_sub_13;
    public $ucionica_sub_13;
    public $komentar_sub_13;

    public $kolegij_sub_14;
    public $ucionica_sub_14;
    public $komentar_sub_14;

    public $kolegij_sub_15;
    public $ucionica_sub_15;
    public $komentar_sub_15;

    public $kolegij_sub_16;
    public $ucionica_sub_16;
    public $komentar_sub_16;

    public $kolegij_sub_17;
    public $ucionica_sub_17;
    public $komentar_sub_17;

    public $kolegij_sub_18;
    public $ucionica_sub_18;
    public $komentar_sub_18;

    public $kolegij_sub_19;
    public $ucionica_sub_19;
    public $komentar_sub_19;

    public $kolegij_sub_20;
    public $ucionica_sub_20;
    public $komentar_sub_20;

    public $kolegij_sub_21;
    public $ucionica_sub_21;
    public $komentar_sub_21;

    public $byCourse = "smjer1";
    public $bySemester = "ljetniSemestar";
    public $byWeeks = array();
    public $byWeek = '1';

    public $kolegiji_svi;

    public function mount(){
        $this->classrooms = Classroom::all();
        //$this->subjectPPs = SubjectPP::all();
       
        //$this->lecturePeriods = LecturePeriod::all();
        $this->kolegiji_svi = SubjectPP::where('course',$this->byCourse)->where('semester', $this->bySemester)->pluck('id');
        $this->lecturePeriods = LecturePeriod::whereIn('subjectPP_id', $this->kolegiji_svi)->where('week', $this->byWeek)->get();
        
        $this->subjectPPs = SubjectPP::where('course',$this->byCourse)->where('semester', $this->bySemester)->get();

        for($i = 1; $i <= 15; $i++){
            array_push($this->byWeeks, $i);
        }
    }

    public function render()
    {
        
        return view('livewire.time-subject',[
            'lecturePeriods' => $this->lecturePeriods]);
    }

    public function filterSearch(){
        $this->byWeek = (string)$this->byWeek;
        $this->kolegiji_svi = SubjectPP::where('course',$this->byCourse)->where('semester', $this->bySemester)->pluck('id');
        $this->lecturePeriods = LecturePeriod::whereIn('subjectPP_id', $this->kolegiji_svi)->where('week', $this->byWeek)->get();

        $this->subjectPPs = SubjectPP::where('course',$this->byCourse)->where('semester', $this->bySemester)->get();
        
    }

    public function submit($day_time){
    
        foreach($this->weekDays as $day){
            foreach($this->timeRange as $time){
                $newString = $day.'_'.$time['start'];

                if(strcmp($day_time,$newString) == 0){
                    $dayString = strtolower(substr($day, 0, 3)); 

                    $timeString = strrchr($day_time, '_');
                    $timeString = substr($timeString, 1, 2);
                    //$timeString = substr($time['start'], 0, 2);

                    if($timeString[0] == "0"){
                        $timeString = substr($timeString, 1, 1);
                    }
                    $this->validate([                  
                        "kolegij_".$dayString."_".$timeString  => 'required',
                        "ucionica_".$dayString."_".$timeString => 'required',
                     ]);
                     
                    LecturePeriod::create([
                        'subjectPP_id' => $this->{"kolegij_".$dayString."_".$timeString},           
                        'classroom_id' => $this->{"ucionica_".$dayString."_".$timeString},                     
                        'comment' => $this->{"komentar_".$dayString."_".$timeString},              
                        'day' => $day,
                        'hours' => $time['start'],
                        'week' => $this->byWeek,
                    ]); 
                }
            }
        }
        $hours_duration = SubjectPP::where('id',$this->{"kolegij_".$dayString."_".$timeString})->first();
        $hours_duration->current_hours = ($hours_duration->current_hours) - 1;
        $hours_duration->save();
       
        session()->flash('message','Uspješno spremljen novi termin!');

       $this->mount();
    }

    public function delete(){
        //dd($this->data_id);
        $data = LecturePeriod::find($this->data_id);

        if($data){
            $hours_duration = SubjectPP::where('id',$data->subjectPP_id)->first();
            $hours_duration->current_hours = ($hours_duration->current_hours) + 1;
            $hours_duration->save();

            LecturePeriod::find($data->id)->delete();
        
            session()->flash('message','Uspješno izbrisan termin!');
            return redirect(request()->header('Referer'));
        }   
    }

    public function edit($id)
    {
        $data = LecturePeriod::findOrFail($id);
        $this->data_id = $id;
        $this->updateSubject = $data->subjectPP_id;
        $this->updateClassroom = $data->classroom_id;
        $this->updateComment = $data->comment;
        $this->updateDay = $data->day;
        $this->updateHours = $data->hours;
    }

    public function update(){
        $data = LecturePeriod::find($this->data_id);

        $data->update([
            'subjectPP_id'=> $this->updateSubject,
            'classroom_id' => $this->updateClassroom,
            'comment'=> $this->updateComment
        ]);

        session()->flash('message', 'Termin je uspješno ažuriran!');
        $this->emit('lectureStore');

        return redirect(request()->header('Referer'));
    }  
}

