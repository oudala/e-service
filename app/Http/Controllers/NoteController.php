<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo"hey";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        $separatedRequests = [];
        for ($i = 0; $i < count($request["id_student"]); $i++) {
            $separatedRequests[] = [
                "id_student" => $request["id_student"][$i],
                "id_module" => $request["id_module"][$i],
                "id_Filier" => $request["id_Filier"][$i],
                "Exam" => $request["Exam"][$i],
                "id_Note"=> $request["id_Note"][$i],
                "submit-prof" => $request["submit-prof"],
                "sauvgard" => $request["sauvgard"],
                "submit-coordinateur" => $request["submit-coordinateur"],
                

            ];
        }
        foreach ($separatedRequests as $separatedRequest) {
            if ($separatedRequest['id_Note'] == null){
                continue;
            }
            $Note = Note::findOrFail($separatedRequest['id_Note']);
            $Note->delete();
        }

        // dd($separatedRequests);
        foreach ($separatedRequests as $separatedRequest) {
            if ($separatedRequest['Exam'] == null){
                continue;
            }
            Note::create([
                'etudient_id' => $separatedRequest['id_student'],
                'Prof_id' => Auth::user()->id,
                'Modul_id' => $separatedRequest['id_module'],
                'filiers_id' =>  $separatedRequest['id_Filier'],
                'Note' => $separatedRequest['Exam'],
                'is_sauvgarde_prof_Exam' => $separatedRequest['sauvgard'],
                'is_submitted_prof_Exam'=> $separatedRequest['submit-prof'],
                'is_submitted_coordinateur_Exam'=> $separatedRequest['submit-coordinateur'],
            ]);
        }
        return back();  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
