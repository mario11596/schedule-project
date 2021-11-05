<?php

namespace App\Http\Controllers;

use App\Models\SubjectPP;
use Illuminate\Http\Request;

class SubjectPPsController extends Controller
{
    public function index(){

        $subjects = SubjectPP::all();

        return view('subjects.index', compact('subjects'));
    }

    public function show($id){

        $subject = SubjectPP::where('id', $id)->first();

        return view('contacts.show', compact('subject'));
    }


    public function create(){
        return view('subjects.create');
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'hours' => 'required|integer',
        ]);

        $subject = new SubjectPP();
        $subject->name = request('name');
        $subject->course = request('course');
        $subject->semester = request('semester');
        $subject->hours = request('hours');
        $subject->current_hours = request('hours');

        $subject->save();
        return redirect('/subject')->with('success', 'Uspješno spremljen novi predmet!');
    }


    public function edit(SubjectPP $subject){
        
        return view('subjects.edit', compact('subject'));
    }


    public function update(Request $request, $id){

        $subject = SubjectPP::where("id","=",$id)->get()->first();

        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'semester' => 'required',
            'hours' => 'required|integer',
        ]);

        $subject->name = request('name');
        $subject->course = request('course');
        $subject->semester = request('semester');
        $subject->hours = request('hours');

        $subject->save();

        return redirect('/subject')->with('info', 'Uspješno se ažuriran kolegij');
    }

    public function destroy($id){
        SubjectPP::where('id', $id)->delete();

        return redirect('/subject');
    }
}
