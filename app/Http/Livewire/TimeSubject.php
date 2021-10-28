<?php

namespace App\Http\Livewire;

use App\Models\Classroom;
use App\Models\LecturePeriod;
use App\Models\SubjectPP;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Request as LivewireRequest;

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

    public $kolegij_pon_22;
    public $ucionica_pon_22;
    public $komentar_pon_22;

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

    public $kolegij_uto_22;
    public $ucionica_uto_22;
    public $komentar_uto_22;

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

    public $kolegij_sri_22;
    public $ucionica_sri_22;
    public $komentar_sri_22;

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

    public $kolegij_cet_22;
    public $ucionica_cet_22;
    public $komentar_cet_22;

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

    public $kolegij_pet_22;
    public $ucionica_pet_22;
    public $komentar_pet_22;

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

    public $kolegij_sub_22;
    public $ucionica_sub_22;
    public $komentar_sub_22;


   

    public function mount(){
        $this->classrooms = Classroom::all();
        $this->subjectPPs = SubjectPP::all();
        $this->lecturePeriods = LecturePeriod::all();
        $this->comment = '';
    }

    public function render()
    {
         //ovdje uhvatiti cijelu bazu
        $this->lecturePeriods = LecturePeriod::all();
        return view('livewire.time-subject');
    }

    public function submit($time_id){
       // echo $time_id;
        //ponedjeljak
        if(!empty($this->kolegij_pon_8) && $time_id == "Ponedjeljak_08:00"){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_8,
                'classroom_id' => $this->ucionica_pon_8,
                'comment' => $this->komentar_pon_8,
                'day' => 'Ponedjeljak',
                'hours' => '08:00',
                'week' => '1'
            ]); 
        } else if(!empty($this->kolegij_pon_9)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_9,
                'classroom_id' => $this->ucionica_pon_9,
                'comment' => $this->komentar_pon_8,
                'day' => 'Ponedjeljak',
                'hours' => '09:00',
                'week' => '1'
            ]); 
    
        }else if(!empty($this->kolegij_pon_10)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_10,
                'classroom_id' => $this->ucionica_pon_10,
                'comment' => $this->komentar_pon_10,
                'day' => 'Ponedjeljak',
                'hours' => '10:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_11)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_11,
                'classroom_id' => $this->ucionica_pon_11,
                'comment' => $this->komentar_pon_11,
                'day' => 'Ponedjeljak',
                'hours' => '11:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_12)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_12,
                'classroom_id' => $this->ucionica_pon_12,
                'comment' => $this->komentar_pon_12,
                'day' => 'Ponedjeljak',
                'hours' => '12:00',
                'week' => '1'
            ]); 
            
        } else if(!empty($this->kolegij_pon_13)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_13,
                'classroom_id' => $this->ucionica_pon_13,
                'comment' => $this->komentar_pon_13,
                'day' => 'Ponedjeljak',
                'hours' => '13:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_14)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_14,
                'classroom_id' => $this->ucionica_pon_14,
                'comment' => $this->komentar_pon_14,
                'day' => 'Ponedjeljak',
                'hours' => '14:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_15)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_15,
                'classroom_id' => $this->ucionica_pon_15,
                'comment' => $this->komentar_pon_15,
                'day' => 'Ponedjeljak',
                'hours' => '15:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_16)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_16,
                'classroom_id' => $this->ucionica_pon_16,
                'comment' => $this->komentar_pon_16,
                'day' => 'Ponedjeljak',
                'hours' => '16:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_17)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_17,
                'classroom_id' => $this->ucionica_pon_17,
                'comment' => $this->komentar_pon_17,
                'day' => 'Ponedjeljak',
                'hours' => '17:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_18)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_18,
                'classroom_id' => $this->ucionica_pon_18,
                'comment' => $this->komentar_pon_18,
                'day' => 'Ponedjeljak',
                'hours' => '18:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_19)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_19,
                'classroom_id' => $this->ucionica_pon_19,
                'comment' => $this->komentar_pon_19,
                'day' => 'Ponedjeljak',
                'hours' => '19:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_20)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_20,
                'classroom_id' => $this->ucionica_pon_20,
                'comment' => $this->komentar_pon_20,
                'day' => 'Ponedjeljak',
                'hours' => '20:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pon_21)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pon_21,
                'classroom_id' => $this->ucionica_pon_21,
                'comment' => $this->komentar_pon_21,
                'day' => 'Ponedjeljak',
                'hours' => '21:00',
                'week' => '1'
            ]); 
        }
        //utorak
        if(!empty($this->kolegij_uto_8)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_8,
                'classroom_id' => $this->ucionica_uto_8,
                'comment' => $this->komentar_uto_8,
                'day' => 'Utorak',
                'hours' => '08:00',
                'week' => '1'
            ]); 
        } else if(!empty($this->kolegij_uto_9)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_9,
                'classroom_id' => $this->ucionica_uto_9,
                'comment' => $this->komentar_puto_9,
                'day' => 'Utorak',
                'hours' => '09:00',
                'week' => '1'
            ]); 
    
        }else if(!empty($this->kolegij_uto_10)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_10,
                'classroom_id' => $this->ucionica_uto_10,
                'comment' => $this->komentar_uto_10,
                'day' => 'Utorak',
                'hours' => '10:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_11)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_11,
                'classroom_id' => $this->ucionica_uto_11,
                'comment' => $this->komentar_uto_11,
                'day' => 'Utorak',
                'hours' => '11:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_12)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_12,
                'classroom_id' => $this->ucionica_uto_12,
                'comment' => $this->komentar_uto_12,
                'day' => 'Utorak',
                'hours' => '12:00',
                'week' => '1'
            ]); 
            
        } else if(!empty($this->kolegij_uto_13)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_13,
                'classroom_id' => $this->ucionica_uto_13,
                'comment' => $this->komentar_uto_13,
                'day' => 'Utorak',
                'hours' => '13:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_14)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_14,
                'classroom_id' => $this->ucionica_uto_14,
                'comment' => $this->komentar_uto_14,
                'day' => 'Utorak',
                'hours' => '14:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_15)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_15,
                'classroom_id' => $this->ucionica_uto_15,
                'comment' => $this->komentar_uto_15,
                'day' => 'Utorak',
                'hours' => '15:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_16)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_16,
                'classroom_id' => $this->ucionica_uto_16,
                'comment' => $this->komentar_uto_16,
                'day' => 'Utorak',
                'hours' => '16:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_17)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_17,
                'classroom_id' => $this->ucionica_uto_17,
                'comment' => $this->komentar_uto_17,
                'day' => 'Utorak',
                'hours' => '17:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_18)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_18,
                'classroom_id' => $this->ucionica_uto_18,
                'comment' => $this->komentar_uto_18,
                'day' => 'Utorak',
                'hours' => '18:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_19)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_19,
                'classroom_id' => $this->ucionica_uto_19,
                'comment' => $this->komentar_uto_19,
                'day' => 'Utorak',
                'hours' => '19:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_20)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_20,
                'classroom_id' => $this->ucionica_uto_20,
                'comment' => $this->komentar_uto_20,
                'day' => 'Utorak',
                'hours' => '20:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_uto_21)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_uto_21,
                'classroom_id' => $this->ucionica_uto_21,
                'comment' => $this->komentar_uto_21,
                'day' => 'Utorak',
                'hours' => '21:00',
                'week' => '1'
            ]); 
        }

        

        //srijeda
        if(!empty($this->kolegij_sri_8)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_8,
                'classroom_id' => $this->ucionica_sri_8,
                'comment' => $this->komentar_sri_8,
                'day' => 'Srijeda',
                'hours' => '08:00',
                'week' => '1'
            ]); 
        } else if(!empty($this->kolegij_sri_9)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_9,
                'classroom_id' => $this->ucionica_sri_9,
                'comment' => $this->komentar_sri_9,
                'day' => 'Srijeda',
                'hours' => '09:00',
                'week' => '1'
            ]); 
    
        }else if(!empty($this->kolegij_sri_10)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_10,
                'classroom_id' => $this->ucionica_sri_10,
                'comment' => $this->komentar_sri_10,
                'day' => 'Srijeda',
                'hours' => '10:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_11)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_11,
                'classroom_id' => $this->ucionica_sri_11,
                'comment' => $this->komentar_sri_11,
                'day' => 'Srijeda',
                'hours' => '11:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_12)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_12,
                'classroom_id' => $this->ucionica_sri_12,
                'comment' => $this->komentar_sri_12,
                'day' => 'Srijeda',
                'hours' => '12:00',
                'week' => '1'
            ]); 
            
        } else if(!empty($this->kolegij_sri_13)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_13,
                'classroom_id' => $this->ucionica_sri_13,
                'comment' => $this->komentar_sri_13,
                'day' => 'Srijeda',
                'hours' => '13:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_14)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_14,
                'classroom_id' => $this->ucionica_sri_14,
                'comment' => $this->komentar_sri_14,
                'day' => 'Srijeda',
                'hours' => '14:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_15)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_15,
                'classroom_id' => $this->ucionica_sri_15,
                'comment' => $this->komentar_sri_15,
                'day' => 'Srijeda',
                'hours' => '15:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_16)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_16,
                'classroom_id' => $this->ucionica_sri_16,
                'comment' => $this->komentar_sri_16,
                'day' => 'Srijeda',
                'hours' => '16:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_17)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_17,
                'classroom_id' => $this->ucionica_sri_17,
                'comment' => $this->komentar_sri_17,
                'day' => 'Srijeda',
                'hours' => '17:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_18)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_18,
                'classroom_id' => $this->ucionica_sri_18,
                'comment' => $this->komentar_sri_18,
                'day' => 'Srijeda',
                'hours' => '18:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_19)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_19,
                'classroom_id' => $this->ucionica_sri_19,
                'comment' => $this->komentar_sri_19,
                'day' => 'Srijeda',
                'hours' => '19:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_20)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_20,
                'classroom_id' => $this->ucionica_sri_20,
                'comment' => $this->komentar_sri_20,
                'day' => 'Srijeda',
                'hours' => '20:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sri_21)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sri_21,
                'classroom_id' => $this->ucionica_sri_21,
                'comment' => $this->komentar_sri_21,
                'day' => 'Srijeda',
                'hours' => '21:00',
                'week' => '1'
            ]); 
        }

        //četvrtak
        if(!empty($this->kolegij_cet_8)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_8,
                'classroom_id' => $this->ucionica_cet_8,
                'comment' => $this->komentar_cet_8,
                'day' => 'Četvrtak',
                'hours' => '08:00',
                'week' => '1'
            ]); 
        } else if(!empty($this->kolegij_cet_9)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_9,
                'classroom_id' => $this->ucionica_cet_9,
                'comment' => $this->komentar_cet_9,
                'day' => 'Četvrtak',
                'hours' => '09:00',
                'week' => '1'
            ]); 
    
        }else if(!empty($this->kolegij_cet_10)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_10,
                'classroom_id' => $this->ucionica_cet_10,
                'comment' => $this->komentar_cet_10,
                'day' => 'Četvrtak',
                'hours' => '10:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_11)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_11,
                'classroom_id' => $this->ucionica_cet_11,
                'comment' => $this->komentar_cet_11,
                'day' => 'Četvrtak',
                'hours' => '11:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_12)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_12,
                'classroom_id' => $this->ucionica_cet_12,
                'comment' => $this->komentar_cet_12,
                'day' => 'Četvrtak',
                'hours' => '12:00',
                'week' => '1'
            ]); 
            
        } else if(!empty($this->kolegij_cet_13)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_13,
                'classroom_id' => $this->ucionica_cet_13,
                'comment' => $this->komentar_cet_13,
                'day' => 'Četvrtak',
                'hours' => '13:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_14)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_14,
                'classroom_id' => $this->ucionica_cet_14,
                'comment' => $this->komentar_cet_14,
                'day' => 'Četvrtak',
                'hours' => '14:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_15)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_15,
                'classroom_id' => $this->ucionica_cet_15,
                'comment' => $this->komentar_cet_15,
                'day' => 'Četvrtak',
                'hours' => '15:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_16)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_16,
                'classroom_id' => $this->ucionica_cet_16,
                'comment' => $this->komentar_cet_16,
                'day' => 'Četvrtak',
                'hours' => '16:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_17)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_17,
                'classroom_id' => $this->ucionica_cet_17,
                'comment' => $this->komentar_cet_17,
                'day' => 'Četvrtak',
                'hours' => '17:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_18)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_18,
                'classroom_id' => $this->ucionica_cet_18,
                'comment' => $this->komentar_cet_18,
                'day' => 'Četvrtak',
                'hours' => '18:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_19)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_19,
                'classroom_id' => $this->ucionica_cet_19,
                'comment' => $this->komentar_cet_19,
                'day' => 'Četvrtak',
                'hours' => '19:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_20)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_20,
                'classroom_id' => $this->ucionica_cet_20,
                'comment' => $this->komentar_cet_20,
                'day' => 'Četvrtak',
                'hours' => '20:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_cet_21)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_cet_21,
                'classroom_id' => $this->ucionica_cet_21,
                'comment' => $this->komentar_cet_21,
                'day' => 'Četvrtak',
                'hours' => '21:00',
                'week' => '1'
            ]); 
        }

        //petak
        if(!empty($this->kolegij_pet_8)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_8,
                'classroom_id' => $this->ucionica_pet_8,
                'comment' => $this->komentar_pet_8,
                'day' => 'Petak',
                'hours' => '08:00',
                'week' => '1'
            ]); 
        } else if(!empty($this->kolegij_pet_9)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_9,
                'classroom_id' => $this->ucionica_pet_9,
                'comment' => $this->komentar_pet_9,
                'day' => 'Petak',
                'hours' => '09:00',
                'week' => '1'
            ]); 
    
        }else if(!empty($this->kolegij_pet_10)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_10,
                'classroom_id' => $this->ucionica_pet_10,
                'comment' => $this->komentar_pet_10,
                'day' => 'Petak',
                'hours' => '10:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_11)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_11,
                'classroom_id' => $this->ucionica_pet_11,
                'comment' => $this->komentar_pet_11,
                'day' => 'Petak',
                'hours' => '11:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_12)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_12,
                'classroom_id' => $this->ucionica_pet_12,
                'comment' => $this->komentar_pet_12,
                'day' => 'Petak',
                'hours' => '12:00',
                'week' => '1'
            ]); 
            
        } else if(!empty($this->kolegij_pet_13)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_13,
                'classroom_id' => $this->ucionica_pet_13,
                'comment' => $this->komentar_pet_13,
                'day' => 'Petak',
                'hours' => '13:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_14)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_14,
                'classroom_id' => $this->ucionica_pet_14,
                'comment' => $this->komentar_pet_14,
                'day' => 'Petak',
                'hours' => '14:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_15)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_15,
                'classroom_id' => $this->ucionica_pet_15,
                'comment' => $this->komentar_pet_15,
                'day' => 'Petak',
                'hours' => '15:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_16)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_16,
                'classroom_id' => $this->ucionica_cpet_16,
                'comment' => $this->komentar_pet_16,
                'day' => 'Petak',
                'hours' => '16:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_17)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_17,
                'classroom_id' => $this->ucionica_pet_17,
                'comment' => $this->komentar_pet_17,
                'day' => 'Petak',
                'hours' => '17:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_18)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_18,
                'classroom_id' => $this->ucionica_pet_18,
                'comment' => $this->komentar_pet_18,
                'day' => 'Petak',
                'hours' => '18:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_19)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_19,
                'classroom_id' => $this->ucionica_pet_19,
                'comment' => $this->komentar_pet_19,
                'day' => 'Petak',
                'hours' => '19:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_20)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_20,
                'classroom_id' => $this->ucionica_pet_20,
                'comment' => $this->komentar_pet_20,
                'day' => 'Petak',
                'hours' => '20:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_pet_21)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_pet_21,
                'classroom_id' => $this->ucionica_pet_21,
                'comment' => $this->komentar_pet_21,
                'day' => 'Petak',
                'hours' => '21:00',
                'week' => '1'
            ]); 
        }

        //subota
        if(!empty($this->kolegij_sub_8)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_8,
                'classroom_id' => $this->ucionica_sub_8,
                'comment' => $this->komentar_sub_8,
                'day' => 'Subota',
                'hours' => '08:00',
                'week' => '1'
            ]); 
        } else if(!empty($this->kolegij_sub_9)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_9,
                'classroom_id' => $this->ucionica_sub_9,
                'comment' => $this->komentar_sub_9,
                'day' => 'Subota',
                'hours' => '09:00',
                'week' => '1'
            ]); 
    
        }else if(!empty($this->kolegij_sub_10)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_10,
                'classroom_id' => $this->ucionica_sub_10,
                'comment' => $this->komentar_sub_10,
                'day' => 'Subota',
                'hours' => '10:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_11)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_11,
                'classroom_id' => $this->ucionica_sub_11,
                'comment' => $this->komentar_sub_11,
                'day' => 'Subota',
                'hours' => '11:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_12)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_12,
                'classroom_id' => $this->ucionica_sub_12,
                'comment' => $this->komentar_sub_12,
                'day' => 'Subota',
                'hours' => '12:00',
                'week' => '1'
            ]); 
            
        } else if(!empty($this->kolegij_sub_13)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_13,
                'classroom_id' => $this->ucionica_sub_13,
                'comment' => $this->komentar_sub_13,
                'day' => 'Subota',
                'hours' => '13:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_14)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_14,
                'classroom_id' => $this->ucionica_sub_14,
                'comment' => $this->komentar_sub_14,
                'day' => 'Subota',
                'hours' => '14:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_15)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_15,
                'classroom_id' => $this->ucionica_sub_15,
                'comment' => $this->komentar_sub_15,
                'day' => 'Subota',
                'hours' => '15:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_16)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_16,
                'classroom_id' => $this->ucionica_sub_16,
                'comment' => $this->komentar_sub_16,
                'day' => 'Subota',
                'hours' => '16:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_17)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_17,
                'classroom_id' => $this->ucionica_sub_17,
                'comment' => $this->komentar_sub_17,
                'day' => 'Subota',
                'hours' => '17:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_18)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_18,
                'classroom_id' => $this->ucionica_sub_18,
                'comment' => $this->komentar_sub_18,
                'day' => 'Subota',
                'hours' => '18:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_19)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_19,
                'classroom_id' => $this->ucionica_sub_19,
                'comment' => $this->komentar_sub_19,
                'day' => 'Subota',
                'hours' => '19:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_20)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_20,
                'classroom_id' => $this->ucionica_sub_20,
                'comment' => $this->komentar_sub_20,
                'day' => 'Subota',
                'hours' => '20:00',
                'week' => '1'
            ]); 
        }else if(!empty($this->kolegij_sub_21)){
            LecturePeriod::create([
                'subjectPP_id' => $this->kolegij_sub_21,
                'classroom_id' => $this->ucionica_sub_21,
                'comment' => $this->komentar_sub_21,
                'day' => 'Subota',
                'hours' => '21:00',
                'week' => '1'
            ]); 
        }
        
       /* $hours_duration = SubjectPP::where('id',$this->subjectPPs)->first();
        $duration = ($hours_duration->hours) - 1;
        $hours_duration->hours = $duration;
        $hours_duration->save();
       
        $this->reset('timetable');*/
        session()->flash('message','Uspješno spremljen novi termin!');
    }

    public function delete($id){
        if($id){
            LecturePeriod::where('id',$id)->delete();
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
       /* $validate = $this->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'gender'        =>  'required'
        ]);*/

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

