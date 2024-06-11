<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\filieres;
use App\Models\Affictation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffictationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_filiere = Auth::user()->department_id;
        $affictation = Affictation::all();
        $filieres = filieres::where('department_id', $id_filiere)->first();
        $module = Module::where('filiere_id', $filieres->id)->get();
        $teachers = User::whereIn('Rolee', ['1', '2', '3', '4'])->whereNull('deleted_at')->get();
        return view('affectation.affectation', compact('filieres', 'module', 'teachers', 'affictation'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Affictation::create([
            'Prof_id' => $request->teacher_id,
            'description' => $request->description,
            'filiers_id' => Auth::user()->Coordinateur_fillier,
            'Modul_id' => $request->Module_id,
            'created_by'=> Auth::user()->LastName,
            'semestre' => $request->Semester,
        ]);
        session()->flash('Add', 'Affectation has been added successfully');
        return redirect('/Affectation'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affictation  $affictation
     * @return \Illuminate\Http\Response
     */
    public function show(Affictation $affictation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affictation  $affictation
     * @return \Illuminate\Http\Response
     */
    public function edit(Affictation $affictation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affictation  $affictation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $affectation = Affictation::findOrFail($request->id);
        $affectation->update([
            'Prof_id' => $request->prof,
            'Modul_id' => $request->Module_id,
            'filiers_id' => Auth::user()->Coordinateur_fillier,
            'description' => $request->description,
            'created_by' => Auth::user()->LastName,
            'semestre' => $request->Semester,
        ]);

        session()->flash('Edit', 'Affectation has been updated successfully');
        return redirect('/Affectation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affictation  $affictation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {       
        $Affictation = Affictation::findOrFail($request->id);
        $Affictation->delete();
        session()->flash('delete', 'Affectation has been deleted successfully');
        return redirect('/Affectation');   
    }
}
