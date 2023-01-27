<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Election;
use App\Models\Voter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class ElectionController extends Controller
{
    //vote list for student
    public function vote(Election $election, Voter $voter)
    {

        $election = DB::table('election')
            ->orderBy('id', 'desc')
            ->where('status', 'Approved')
            ->get();

        $id = Auth::user()->id;

        $voter = DB::table('voter')
            ->where('user_id', $id)
            ->exists();

        return view('election.studList', compact('election', 'voter'));
    }

    //voter list for student
    public function voter($id)
    {
        $user_id = Auth::user()->id;

        $election = Election::find($id);
        $election->total_vote += 1;
        $voter = new Voter;
        $voter->user_id = $user_id;
        $voter->candidate_id = $election->id;

        $voter->save();
        $election->update();
        return redirect()->route('election.studList');
    }


    //register election for student
    public function register()
    {
        $id = Auth::user()->id;
        $election = DB::table('election')
            ->where('user_id', $id)
            ->exists();

        $election_data = DB::table('election')
            ->where('user_id', $id)
            ->get();


        return view('election.register', compact('election', 'election_data'));
    }

    //update registration page for student
    public function updateReg(Request $request, $id)
    {
        // $election = Election::find($id);
        $election = DB::table('election')->where('id', $id)->first();
        return view('election.updateReg', compact('election')); //List for vote (UPDATE & DELETE)
    }

    //list for committee
    public function comList()
    {
        $election = DB::table('election')
            ->where('status', 'Approved')
            ->get();

        $candidate_ID = 6;

        $total_voter = DB::table('voter')
            ->where('candidate_ID', $candidate_ID)
            ->count();

        return view('election.comList', compact('election', 'total_voter'));
    }

    //info for committee
    public function comInfo(Request $request, $id)
    {

        $election = Election::find($id);


        return view('election.comInfo', compact('election'));
    }

    //list for hosd
    public function coorList()
    {
        $election = DB::table('election')
            ->orderBy('id', 'desc')
            ->where('status', 'Pending')
            ->get();


        return view('election.coorList', compact('election'));
    }

    //info for hosd
    public function coorInfo(Request $request, $id)
    {
        $election = Election::find($id);


        return view('election.coorInfo', compact('election'));
    }

    //store election registration
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $profile_img = $request->file('profile_img');
        $student_ID = $request->input('student_ID');
        $full_name = $request->input('full_name');
        $crt_semester = $request->input('crt_semester');
        $crt_result = $request->input('crt_result');
        $prv_activities = $request->input('prv_activities');
        $manifesto = $request->input('manifesto');
        $status = 'Pending';
        $total_vote = 0;


        $filename = time() . '.' . $profile_img->getClientOriginalExtension();
        $request->profile_img->move('assets', $filename);

        $data = array(
            'user_id' => $id,
            'profile_img' => $filename,
            'student_ID' => $student_ID,
            'full_name' => $full_name,
            'crt_semester' => $crt_semester,
            'crt_result' => $crt_result,
            'prv_activities' => $prv_activities,
            'manifesto' => $manifesto,
            'status' => $status,
            'total_vote' => $total_vote,
        );

        DB::table('election')->insert($data);

        return redirect()->route('election.register');
    }

    public function show(Election $election)
    {
        $election = DB::table('election')
            ->orderBy('id', 'asc')
            ->get();

        return view('election.updateReg', compact('election'));
    }

    //update registraion for student
    public function update(Request $request, $id)
    {
        // $election = Election::find($id);
        $election = DB::table('election')->where('id', $id)->first();
        $path = public_path() . '/assets/' . $election->profile_img;
        if (file_exists($path)) {
            unlink($path);
        }

        $election->profile_img = $request->file('profile_img');
        $election->student_ID = $request->input('student_ID');
        $election->full_name = $request->input('full_name');
        $election->crt_semester = $request->input('crt_semester');
        $election->crt_result = $request->input('crt_result');
        $election->prv_activities = $request->input('prv_activities');
        $election->manifesto = $request->input('manifesto');

        $filename = time() . '.' . $election->profile_img->getClientOriginalExtension();
        $request->profile_img->move('assets', $filename);

        $election->profile_img = $filename;
        $election->update();

        return redirect()->route('election.register')
            ->with('Success', 'Election registration has been updated');
    }

    //cancel registration
    // public function destroy(Request $request, $id)
    // {
    //     $election = Election::find($id);
    //     $path = public_path() . '/assets/' . $election->profile_img;
    //     if (file_exists($path)) {
    //         unlink($path);
    //     }

    //     DB::delete('DELETE FROM election WHERE id = ?', [$id]);
    //     echo "Deleted Successfully";

    //     return redirect()->back()->with('message', 'Deleted');
    // }

    //registration approval for hosd
    public function approval($id)
    {
        DB::table('election')->where('id', $id)->update(array('status' => 'Approved'));
        // $election = Election::find($id);
        // $election->status = "Approved";

        // $election->update();
        return redirect()->route('election.coorList');
    }

    //registration rejection for hosd
    public function reject($id)
    {
        DB::table('election')->where('id', $id)->update(array('status' => 'Rejected'));
        // $election = Election::find($id);
        // $election->status = "Rejected";

        // $election->update();
        return redirect()->route('election.coorList');
    }
}