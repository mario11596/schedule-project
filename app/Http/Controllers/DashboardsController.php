<?php

namespace App\Http\Controllers;

use App\Models\LecturePeriod;
use App\Models\SubjectPP;
use Carbon\Carbon;
use Illuminate\Http\Request;



class DashboardsController extends Controller
{


    public function index(Request $request){
         

        $byCourse = isset($request->byCourse) ? $request->byCourse : '';
        $bySemester = isset($request->bySemester) ? $request->bySemester : '';

        $lecturePeriods = $this->searchFilter($byCourse,$bySemester);

        $weekDays = [
            '1' => 'Ponedjeljak',
            '2' => 'Utorak',
            '3' => 'Srijeda',
            '4' => 'Cetvrtak',
            '5' => 'Petak',
            '6' => 'Subota'
        ];

        $from = '08:00';
        $to = '22:00';
        $time = Carbon::parse($from);
        $timeRange = [];

        do{
            array_push($timeRange, [
                'start' => $time->format("H:i"),
                'end' => $time->addMinutes(60)->format("H:i")
            ]);    
        } while ($time->format("H:i") !== $to);

        
        return view('dashboard', compact('weekDays','timeRange', 'lecturePeriods', 'byCourse','bySemester'));
    }

    public function searchFilter($byCourse, $bySemester){

        $kolegiji_svi = SubjectPP::where('course',$byCourse)->where('semester', $bySemester)->pluck('id');
        $lecturePeriods = LecturePeriod::whereIn('subjectPP_id', $kolegiji_svi)->get();

        return $lecturePeriods;
    }  
}
