<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProposalModel;
use App\Models\ProposeProposal;
use App\Http\Requests\ProposalRequest;

class ProposalController extends Controller
{      
    public function ProposalProposedHOSD()
    {
        //To view the page for HOSD
        $proposal = ProposeProposal::all();
        return view('proposal.proposal_listHOSD', compact('proposal'));
    }

    public function ProposalProposedCoordinator()
    {
        //To view page for Coordinator
        $proposal = ProposeProposal::all();
        return view('proposal.proposal_listCoordinator', compact('proposal'));
    }
    public function ProposalProposedDean()
    {
        //To view page for Dean
        $proposal = ProposeProposal::all();
        return view('proposal.proposal_listDean', compact('proposal'));
    }

    public function show($id)
    {
        //view details of the proposal
        $proposal = ProposalModel::find($id);
        return view('proposal.show_proposal', compact('proposal'));
    }

    public function showProposal()
    {
        $proposal = ProposalModel::all();
        return view('proposal.proposal_view', compact('proposal'));
    }

    public function createProposal($id)
    {
        return view('proposal.create_proposal');
    }

    public function editProposal($id)
    {
        $proposal = ProposalModel::find($id);
        return view('proposal.edit_proposal', compact('proposal'));
    }

    public function store(Request $request)
    {
        ProposalModel::create($request->all());
        //check balik

        return redirect()->route('proposal.view')->with('success', 'Successfully added');
    }

    public function update(ProposalRequest $request, $id)
    {
        $proposal = ProposalModel::find($id);
        $proposalSubmit = SubmitProposal::where('proposal_id', '=', $proposal->id);
        $proposalSubmit->delete();

        $proposal->update($request->all());
        $proposal->statusapprovalbyHOSD = "";
        $proposal->statusapprovalbyCoordinator = "";
        $proposal->statusapprovalbyDean = "";

        return redirect()->route('proposal.view')->with('success', 'Successfully updated');
    }

    public function destroy($id)
    {
        $proposal = ProposalModel::find($id);
        $proposal->delete();
        $proposal->submit->delete();

        return back ()->with('success', 'Successfully deleted');
    }

    public function approveProposalHOSD($id){

        $proposal = ProposalModel::find($id);
        $proposal->statusbyHOSD = "Approved";
        $proposal->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function rejectProposalHOSD($id){

        $proposal = ProposalModel::find($id);
        $proposal->statusbyHOSD = "Rejected";
        $proposal->save();


        return back()->with('success', 'Successfully rejected');
    }

    public function approveProposalCoordinator($id){

        $proposal = ProposalModel::find($id);
        $proposal->statusbyCoordinator = "Approved";
        $proposal->save();
        
        return back()->with('success', 'Successfully approved');
    }

    public function rejectReportCoordinator($id){

        $proposal = ProposalModel::find($id);
        $proposal->statusbyCoordinator = "Rejected";
        $proposal->save();


        return back()->with('success', 'Successfully rejected');
    }

    public function confirmReportDean($id){

        $proposal = ProposalModel::find($id);
        $proposal->statusbyDean = "Confirm";
        $proposal->save();
        
        return back()->with('success', 'Successfully Confirm');
    }

    public function denyReportDean($id){

        $proposal = ProposalModel::find($id);
       
        $proposal->statusbyDean = "Deny";
        $proposal->save();


        return back()->with('success', 'Successfully deny');
    }

    public function showDelete($id){

        $proposal = ProposalModel::find($id);
        return view('proposal.delete_proposal', compact('proposal'));
    }
    
}
