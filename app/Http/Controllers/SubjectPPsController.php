<?php

namespace App\Http\Controllers;

use App\Models\SubjectPP;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubjectPPsController extends Controller
{
    public function index(){

        $subjects = SubjectPP::all();

        return view('subjects.index', compact('subjects'));
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

    public function search(Request $request){
        $search = $request->input('search') ? : "";

        $subjects = SubjectPP::query()
        ->where(function(Builder $builder) use ($search){
            $builder->where('name', 'LIKE', "%{$search}%")
            ->orWhere('course', 'LIKE', "%{$search}%");
        })->get();
        

        if(count($subjects) > 0){
            return view('subjects.index', compact('subjects','search'));
        } else {
            return redirect('/subject')->with('warning', 'Nema traženog kolegija!');
        }
    }
}
