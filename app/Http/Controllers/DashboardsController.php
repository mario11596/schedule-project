<?php

namespace App\Http\Controllers;

use App\Models\LecturePeriod;
use App\Models\SubjectPP;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;

class DashboardsController extends Controller
{
    public function index(Request $request){
        $byCourse = isset($request->byCourse) ? $request->byCourse : '';
        $bySemester = isset($request->bySemester) ? $request->bySemester : '';
        $byWeek = isset($request->byWeek) ? $request->byWeek : '';
        $byWeek_start = '';
        $byWeek_end = '';
        

        $lecturePeriods = $this->searchFilter($byCourse,$bySemester, $byWeek);
      
        if(isset($byWeek)){
            $byWeek_start = Week::where('name', $byWeek)->where('course', $byCourse)->where('semester', $bySemester)->first();
            
            if($byWeek_start != NULL){
                $byWeek_start = date_create_from_format("Y-m-d", $byWeek_start->start_day)->format("d.m.Y.");
                $byWeek_end = date('d.m.Y.', strtotime($byWeek_start. ' + 6 days'));
            }
        }
        
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
        $byWeeks = [];

        do{
            array_push($timeRange, [
                'start' => $time->format("H:i"),
                'end' => $time->addMinutes(60)->format("H:i")
            ]);    
        } while ($time->format("H:i") !== $to);

        for($i = 1; $i <= 15; $i++){
            array_push($byWeeks, $i);
        }
        
        if($request->has('exportPDF')){
            $pdf = PDF::loadView('pdfView',compact('lecturePeriods', 'weekDays', 'timeRange', 'byWeek_start', 'byWeek_end'))->setPaper('A4', 'landscape');
            
            return $pdf->download('raspored-sati.pdf');
        }
        return view('dashboard', compact('weekDays','byWeek','timeRange','byWeeks', 'byWeek_start', 'byWeek_end', 'lecturePeriods', 'byCourse','bySemester'));
    }

    public function searchFilter($byCourse, $bySemester, $byWeek){
        $kolegiji_svi = SubjectPP::where('course',$byCourse)->where('semester', $bySemester)->pluck('id');
        $lecturePeriods = LecturePeriod::whereIn('subjectPP_id', $kolegiji_svi)->where('week', $byWeek)->get();
     
        return $lecturePeriods;
    }  
}
