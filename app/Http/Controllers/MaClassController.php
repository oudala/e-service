<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Module;
use App\Models\MaClass;
use App\Models\filieres;
use App\Models\Affictation;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\Support\Facades\Auth;

class MaClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //$coordinateur === null and $Users->role_id === 1
        $Users = Auth::user();
        $coordinateur = Auth::user()->Coordinateur_fillier;
        if ($Users->Rolee == 3) {
            $MaClass = filieres::where('id', $coordinateur)->get();
        } elseif ($Users->Rolee == 1) {
            $MaClass = filieres::all();
        }elseif ($Users->Rolee == 2) {
            $MaClass = filieres::where('department_id', $Users->department_id)->get();
        }elseif ($Users->Rolee == 4) {
            $affictations = Affictation::where('Prof_id', $Users->id)->with('filieres')->get();
            $MaClass = $affictations->pluck('filliere');
        }else{
            $MaClass = filieres::where('Prof_id', $Users->filiere_id);
        }

        return view('MaClass.MaClass', compact('MaClass', 'Users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaClass  $maClass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Module = Module::findOrFail($id);
        $fillier=filieres::where('id', $Module->filiere_id)->first();
        $Users=User::where('filiere_id', $fillier->id)->get();
        $Note=Note::where('Modul_id', $Module->id)->get();

        $usersWithNotes = User::where('filiere_id', $fillier->id)
            ->leftJoin('notes', function($join) use ($Module) {
                $join->on('users.id', '=', 'notes.etudient_id');
            })
            ->select('users.id', 'users.FirstName', 'users.LastName', 'users.email', 'users.CNI', 'users.Rolee', 'users.filiere_id', 'users.department_id', 'users.phone_number', 'users.address', 'users.CNE','notes.id as notes_id', 'notes.Note as Note', 'notes.is_sauvgarde_prof_Exam as is_sauvgardeProf', 'notes.is_submitted_prof_Exam as submitProf','notes.is_submitted_coordinateur_Exam as submitCoordinateur')
            ->get();
            
        
        return view('MaClass.MaEtudient', compact('Module', 'fillier', 'usersWithNotes'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaClass  $maClass
     * @return \Illuminate\Http\Response
     */
    public function edit(MaClass $maClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaClass  $maClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaClass $maClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaClass  $maClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaClass $maClass)
    {
        //
    }
    public function showModuls(Request $request)
    {   
        $MaClass = Module::where('filiere_id', $request->filiere)->get();
        $fillier=filieres::where('id', $request->filiere)->first();
        return view('MaClass.MaModuls', compact('MaClass','fillier'));
    }
}
