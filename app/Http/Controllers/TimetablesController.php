<?php

namespace App\Http\Controllers;

use App\Models\LecturePeriod;
use App\Models\SubjectPP;
use Carbon\Carbon;

class TimetablesController extends Controller
{
    public function index(){
        $subjectAll = SubjectPP::all();

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

        $byWeeks = [];
        for($i = 1; $i <= 15; $i++){
            array_push($byWeeks, $i);
        }

        return view('timetable.index', compact('weekDays','timeRange', 'subjectAll', 'byWeeks'));
    }
}
