<?php

namespace App\Http\Controllers;

use App\Models\filieres;
use App\Models\departement;
use Illuminate\Http\Request;

class FilierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = filieres::with('departement')->get();
        $departement=departement::all();
        return view('filiere/filiere',compact('filieres','departement'));
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
            filieres::create([
                'name' => $request->module_name,
                'description' => $request->description,
                'department_id' => $request->Module_id,
            ]);
            session()->flash('Add', 'Module has been added successfully');
            return redirect('/filiere'); 
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filier  $filier
     * @return \Illuminate\Http\Response
     */ 
    public function show(filieres $filier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\filieres  $filier
     * @return \Illuminate\Http\Response
     */
    public function edit(filieres $filier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\filieres  $filier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $id = $request->filiere_id;
        $Product = filieres::findOrFail($request->id);

        $Product->update([
        'name' => $request->name,
        'description' => $request->description,
        'department_id' => $id,
        ]); 

        session()->flash('Edit', '  Module has been updated successfully');
        return redirect('/filiere');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\filieres  $filier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $filiere = filieres::findOrFail($request->Module_id);
        $filiere->delete();
        session()->flash('delete', 'Module has been deleted successfully');
        return redirect('/filiere');   
    }
}
