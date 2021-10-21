<?php

namespace App\Http\Controllers;

use App\Models\LecturePeriod;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimetablesController extends Controller
{

    public function index(){
        $lecturePeriods = LecturePeriod::all();

        $weekDays = [
            '1' => 'Ponedjeljak',
            '2' => 'Utorak',
            '3' => 'Srijeda',
            '4' => 'Četvrtak',
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

        
        return view('timetable.index', compact('weekDays','timeRange','lecturePeriods'));
    }

    
}
