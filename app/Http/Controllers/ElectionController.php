<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Election;
use Illuminate\Support\Facades\DB as FacadesDB;

class ElectionController extends Controller
{
    public function vote(Election $election)
    { 

        $election = DB::table('election')
        ->orderBy('id','desc')
        ->where('status','Approved')
        ->get();
        

        return view('election.student.studList', compact('election')); //List for vote (DISPLAY)
    }
    public function register()
    { //register election (CREATE)
        return view('election.student.register');
    }
    public function updateReg(Election $election)
    {
        return view('election.student.updateReg', compact('election')); //List for vote (UPDATE & DELETE)
    }
    public function comList()
    { // List for Committee
        return view('election.committee.comList');
    }
    public function comInfo()
    { //Info for Committee
        return view('election.committee.comInfo');
    }
    public function hosdList()
    { // List for Committee
        $election = DB::table('election')
        ->orderBy('id','desc')
        ->where('status','Pending')
        ->get();
        

        return view('election.hosd.hosdList', compact('election'));
    }
    public function hosdInfo()
    { //Info for Committee
        return view('election.hosd.hosdInfo');
    }



    public function store(Request $request) //Store details
    {

        $profile_img = $request->file('profile_img');
        $student_ID = $request->input('student_ID');
        $full_name = $request->input('full_name');
        $crt_semester = $request->input('crt_semester');
        $crt_result = $request->input('crt_result');
        $prv_activities = $request->input('prv_activities');
        $manifesto = $request->input('manifesto');
        $status = 'Pending';
        

        $filename = time(). '.' .$profile_img->getClientOriginalExtension();
        $request->profile_img->move('assets',$filename);

        
        $data = array(
            'profile_img' => $filename,
            'student_ID' => $student_ID,
            'full_name' => $full_name,
            'crt_semester' => $crt_semester,
            'crt_result' => $crt_result,
            'prv_activities' => $prv_activities,
            'manifesto' => $manifesto,
            'status' => $status,
        );

        DB::table('election')->insert($data);

        return redirect()->route('election.student.updateReg')
            ->with('Success', 'Election registration has been success');
    }

    public function show(Election $election)
    {
        $election = DB::table('election')
        ->orderBy('id','asc')
        ->get();

        return view('election.student.updateReg', compact('election'));
    }

    public function update(Request $request, Election $election) //Update registration details
    {
        $request->validate([
            'profile_img' => 'required',
            'student_ID' => 'required',
            'full_name' => 'required',
            'crt_semester' => 'required',
            'crt_result' => 'required',
            'prv_activities' => 'required',
            'manifesto' => 'required',
            'status' => 'status',
        ]);
        $election->update($request->all());
        return redirect()->route('dahshboard') //go to dashboard
            ->with('Success', 'Election registration has been updated');
    }

    public function destroy(Election $election) //Cancel registration
    {
        $election->delete();
        return redirect()->route('studList')
        ->with('Success', 'Election registration has been deleted');
    }

    public function approval($id)
    {
        $election = Election::find($id);
        $election->status="Approved";
        
        $election->update();
        return redirect()->route('election.hosd.hosdlist');

    }
}
