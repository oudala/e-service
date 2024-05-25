<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use App\Models\AttachmentUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $profs = User::where('Rolee', 4)->get();
        return view('prof.prof', compact('profs'));
    }

    public function Status_Update($id, Request $request)
    {   
        $User = User::findOrFail($id);

        if ($request->Status === 'Added') {

            $User->update([
                'BoolNote' => 1,
                'NoteStatus' =>'Added',
                'Payment_Date' => $request->Payment_Date,
            ]);

            DetailUser::create([
                'FirstName' => $request->FirstName,
                'LastName' => $request->teacher_LastName,
                'user_id' => $request->teacher_id,
                'StatutNote' => $request->Status,
                'ValueNote' => 1,
                'created_by' => Auth::user()->LastName,
            ]);
        }

        else {
            $User->update([
                'BoolNote' => 2,
                'NoteStatus' => 'In process',
                'Payment_Date' => $request->Payment_Date,
            ]);
            DetailUser::create([
                'FirstName' => $request->FirstName,
                'LastName' => $request->teacher_LastName,
                'user_id' => $request->teacher_id,
                'StatutNote' => $request->Status,
                'ValueNote' => 2,
                'created_by' => (Auth::user()->name),
            ]);
        }
        session()->flash('Status_Update');
        return redirect('/Prof');

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prof.addProf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
        User::create([
            'FirstName' => $request->teacher_FirstName,
            'LastName' => $request->teacher_LastName,
            'email' => $request->email, 
            'JoinDate' =>  $request->Due_date,
            'Rolee' => '4',
            'password' => bcrypt('prof1234'),
            'phone_number' =>  $request->phone,
            'CNI' => $request->cni,
            'department_id'=> auth::user()->department_id,
        ]);


        if ($request->hasFile('pic')) {

            $User = User::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $request->cni;
            $teacher_number = $request->teacher_LastName;
            $imageName = $request->cni . '.' . $image->getClientOriginalExtension();

            $attachments = new AttachmentUser();
            $attachments->file_name = $file_name;
            $attachments->teacher_number = $teacher_number;
            $attachments->Created_by = Auth::user()->FirstName;
            $attachments->teacher_id = $User;
            $attachments->save();
            
            // move pic 
            $image->move(public_path('Attachments/' . $teacher_number), $imageName);
        }


        // $user = User::first();
        // Notification::send($user, new \App\Notifications\add_invoices($invoice_id));

        // $user = User::get();
        // $invoices = invoices::latest()->first();
        // Notification::send($user, new \App\Notifications\Add_invoice_new($invoices));




        
        // // event(new MyEventClass('hello world'));

        session()->flash('Add', 'The teacher was added successfully');
        return back();
    }
    public function profile($id)
    {
        $user = User::where('id', $id)->first();
        $Details = DetailUser::where('user_id', $id)->get();
        return view('prof.profile', compact('user', 'Details'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
        */
    public function show($id)
    {   
        $user = User::where('id', $id)->first();
        return view('prof/Note_update', compact('user'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('prof.edit_prof', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $user = User::findOrFail($request->invoice_id);
        $user->update([
            'FirstName' => $request->teacher_FirstName,
            'LastName' => $request->teacher_LastName,
            'email' => $request->email,
            'JoinDate' => $request->Due_date,
            'Rolee' => '4',
            'phone_number' => $request->phone,
            'CNI' => $request->cni,
            'department_id' => auth::user()->department_id,
        ]);

        session()->flash('success', 'Teacher updated successfully');
        return redirect('/Prof');
                }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $id = $request->prof_id;
        $teacher = User::where('id', $id)->first();
        $Details = AttachmentUser::where('teacher_id', $id)->first();

        $id_page =$request->id_page;


        if (!$id_page==2) {

        if (!empty($Details->invoice_number)) {

            Storage::disk('public_uploads')->deleteDirectory($Details->invoice_number);
        }
        $teacher->forceDelete();
        session()->flash('delete_teacher');
        return redirect('/Prof');
        }

        else {

            $teacher->delete();
            session()->flash('archive_teacher');
            return redirect('/teacher/Archive');
        }

    }
}
