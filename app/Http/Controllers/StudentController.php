<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\filieres;
use Illuminate\Http\Request;
use App\Models\AttachmentUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Student = User::where('Rolee', 5)->get();
        return view('Student.Student', compact('Student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $id_filiere= Auth::user()->department_id;
        $filieres = filieres::where('department_id', $id_filiere )->get();
        return view('Student.addStu', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        if($request->password){
            $pass=$request->password;
        }else{
            $pass=bcrypt('pass');
        }
        User::create([
            'FirstName' => $request->teacher_FirstName,
            'LastName' => $request->teacher_LastName,
            'email' => $request->email, 
            'JoinDate' =>  $request->Due_date,
            'Rolee' => '5',
            'password' => $pass,
            'filiere_id' => $request->Module_id,
            'phone_number' =>  $request->phone,
            'CNI' => $request->cni,
            'CNE' => $request->CNE,
            'department_id'=> Auth::user()->department_id,
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
    session()->flash('Add', 'The Student was added successfully');
    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $id_filiere= Auth::user()->department_id;
        $filieres = filieres::where('department_id', $id_filiere )->get();
        return view('Student.edit_Stu', compact('user','filieres'));
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
        $user = User::findOrFail($request->etu_id);
        if($request->password){
            $pass=$request->password;
        }else{
            $pass=$user->password;
        }
        $user->update([
            'FirstName' => $request->etu_FirstName,
            'LastName' => $request->etu_LastName,
            'email' => $request->email,
            'JoinDate' => $request->Due_date,
            'Rolee' => '5',
            'phone_number' => $request->phone,
            'CNI' => $request->cni,
            'department_id' => auth::user()->department_id,
            'filiere_id'=> $request->filiere_id,
            'password'=>$pass,
            'CNE' => $request->CNE,

        ]);

        session()->flash('success', 'Student updated successfully');
        return redirect('/Student');
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
        $etu = User::where('id', $id)->first();
        $Details = AttachmentUser::where('teacher_id', $id)->first();

        $id_page =$request->id_page;


        if (!$id_page==2) {
            dd('hi');

            if (!empty($Details->invoice_number)) {

                Storage::disk('public_uploads')->deleteDirectory($Details->invoice_number);
            }
                $etu->forceDelete();
                session()->flash('delete_teacher');
                return redirect('/Student');
        }

        else {

            $etu->delete();
            session()->flash('archive_teacher');
            return redirect('/Student/Archive');
        }
    }
}
