<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AttachmentUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AchiveProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::onlyTrashed()->get();
        return view('prof.Archive_prof',compact('user'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $id = $request->invoice_id;
        $flight = User::withTrashed()->where('id', $id)->restore();
        session()->flash('restore_invoice');
        return redirect('/teacher/Archive');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->invoice_id;
        // $invoices = invoices::where('id', $id)->first();
        $Details = AttachmentUser::where('teacher_id', $id)->first();
        $invoices = User::withTrashed()->where('id',$request->invoice_id)->first();
        if (!empty($Details->teacher_number)) {

            Storage::disk('public_uploads')->deleteDirectory($Details->teacher_number);
        }
        DB::table('detail_users')->where('user_id', $invoices->id)->delete();
        $invoices->forceDelete();
        session()->flash('delete_invoice');
        return redirect('/teacher/Archive');
    }
}
