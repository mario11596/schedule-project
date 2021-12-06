<?php

namespace App\Http\Controllers;

use App\Models\Week;
use Illuminate\Http\Request;

class WeeksController extends Controller
{
    public function index(){

        $weeks = Week::orderBy('course', 'ASC')->orderBy('semester', 'ASC')->get();

        return view('weeks.index', compact('weeks'));
    }


    public function create(){
        return view('weeks.create');
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required|integer',
            'start_day' =>'required',
            'course' => 'required',
            'semester' => 'required',
        ]);

        $week = new Week();
        $week->name = request('name');
        $week->start_day = request('start_day');
        $week->course = request('course');
        $week->semester = request('semester');
       

        $week->save();
        return redirect('/week')->with('success', 'Uspješno spremljen novi tjedan!');
    }

    public function edit(Week $week){
        
        return view('weeks.edit', compact('week'));
    }


    public function update(Request $request, $id){

        $week = Week::where("id","=",$id)->get()->first();

        $request->validate([
            'name' => 'required',
            'start_day' =>'required',
            'course' => 'required',
            'semester' => 'required',
        ]);

        $week->name = request('name');
        $week->start_day = request('start_day');
        $week->course = request('course');
        $week->semester = request('semester');
        

        $week->save();

        return redirect('/week')->with('info', 'Uspješno je ažuriran tjedan');
    }

    public function destroy($id){
        Week::where('id', $id)->delete();

        return redirect('/week');
    }

}
