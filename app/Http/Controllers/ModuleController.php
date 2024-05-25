<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\filieres;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $Module=Module::all();
        $filieres=filieres::all();
        return view('Module/Module',compact('Module','filieres'));
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
        Module::create([
            'name' => $request->module_name,
            'description' => $request->description,
            'filiere_id' => $request->Module_id,
        ]);
        session()->flash('Add', 'Module has been added successfully');
        return redirect('/Module'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $id = $request->filiere_id;
        $Product = Module::findOrFail($request->id);

        $Product->update([
        'name' => $request->name,
        'description' => $request->description,
        'filiere_id' => $id,
        ]); 

        session()->flash('Edit', '  Module has been updated successfully');
        return redirect('/Module');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $Module = Module::findOrFail($request->Module_id);
        $Module->delete();
        session()->flash('delete', 'Module has been deleted successfully');
        return redirect('/Module');   
    }
}
