<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttachmentUser;
use Illuminate\Support\Facades\Auth;

class AttachmentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'file_name' => 'mimes:pdf,jpeg,png,jpg',
    
            ], [
                'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
            ]);
            
            $image = $request->file('file_name');
            $file_name = $image->getClientOriginalName();
    
            $attachments =  new AttachmentUser();
            $attachments->file_name = $file_name;
            $attachments->teacher_number = $request->teacher_number;
            $attachments->teacher_id = $request->teacher_id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->save();
            
            // move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('Attachments/'. $request->invoice_number), $imageName);
            
            session()->flash('Add', 'تم اضافة المرفق بنجاح');
            return back();  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttachmentUser  $attachmentUser
     * @return \Illuminate\Http\Response
     */
    public function show(AttachmentUser $attachmentUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttachmentUser  $attachmentUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AttachmentUser $attachmentUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttachmentUser  $attachmentUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttachmentUser $attachmentUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttachmentUser  $attachmentUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttachmentUser $attachmentUser)
    {
        //
    }
}
