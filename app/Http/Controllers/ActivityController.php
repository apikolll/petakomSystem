<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Http\Requests\ActivityRequest;
use App\Models\ProposeActivity;

class ActivityController extends Controller
{
    public function index()
    { //main activity page
        return view('activity.activity');
    }

    // temporary

    public function activityProposed(){
        $activity = ProposeActivity::all();
        if(auth()->user()->category == "Coordinator")
        {
            return view('activity.coordinator.coor', compact('activity'));
        }elseif(auth()->user()->category == "Dean")
        {  
            return view('activity.dean.dean', compact('activity'));
        }elseif(auth()->user()->category == "HOSD")
        {
            return view('activity.hosd.hosd', compact('activity'));
        }
        
    }

    public function show($id)
    { //details activity
        $activity = Activity::find($id);
        return view('activity.show_activity', compact('activity'));
    }
    // 
    public function showActivity()
    {
        $activity = Activity::all();
        
        return view(('activity.activity_login'), compact('activity'));
    }

    public function createActivity()
    {
        return view('activity.create_activity');
    }


    public function editActivity($id)
    {

        $activity = Activity::find($id);
        return view('activity.edit_activity', compact('activity'));
    }

    public function store(ActivityRequest $request)
    {

        Activity::create($request->all());

        return redirect()->route('activity.login')->with('success', 'Successfully added');
    }

    public function update(ActivityRequest $request, $id)
    {

        $activity = Activity::find($id);
        $proposed = ProposeActivity::where('activity_id', '=', $activity->id);
        $proposed->delete();

        $activity->update($request->all());
        $activity->status = "";
        $activity->save();

        return redirect()->route('activity.login')->with('success', 'Successfully updated');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        // $activity->propose->delete();

        return back()->with('success', 'Successfully deleted');
    }

    public function proposeActivity($id)
    {
        $activity = Activity::find($id);
        $propose = new ProposeActivity();
        $pactivity = $activity->id;
        $exist = ProposeActivity::where([
            ['activity_id', '=', $pactivity]
        ])->first();


        if($exist){
            return back()->with('error', 'Already proposed');
        }

        $propose->activity_id = $activity->id;
        $propose->save();

        
        return back()->with('success', 'Successfully proposed');
    }

    public function showProposedActivity(){

        $propose = Activity::where('status', '=', 'Approved')->get();
        // dd($propose);
        // $propose = ProposeActivity::all();
        return view('activity.propose_activity', compact('propose'));
    }

    // HOSD
    public function hosdApproval($id){

        $activity = Activity::find($id);
        $activity->HOSD = "Approved";
        $activity->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function hosdReject($id){

        $activity = Activity::find($id);
       
        $activity->HOSD = "Rejected";
        $activity->save();


        return back()->with('success', 'Successfully rejected');
    }

    // Coordinator
    public function coorApproval($id){

        $activity = Activity::find($id);
        $activity->Coordinator = "Approved";
        $activity->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function coorReject($id){

        $activity = Activity::find($id);
       
        $activity->Coordinator = "Rejected";
        $activity->save();

        return back()->with('success', 'Successfully rejected');
    }

    // Dean
    public function deanApproval($id){

        $activity = Activity::find($id);
        $activity->Dean = "Approved";
        $activity->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function deanReject($id){

        $activity = Activity::find($id);
       
        $activity->Dean = "Rejected";
        $activity->save();


        return back()->with('success', 'Successfully rejected');
    }

}
