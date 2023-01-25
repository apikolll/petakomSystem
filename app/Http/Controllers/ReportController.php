<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportModel;
use App\Models\ProposeReport;
use App\Http\Requests\ReportRequest;

class ReportController extends Controller
{
    //To view the page for HOSD
    public function ReportProposedHOSD()
    {
        $report = ProposeReport::all();
        return view('report.report_listHOSD', compact('report'));

    }
    //To view page for Coordinator
    public function ReportProposedCoordinator()
    { 
        $report = ProposeReport::all();
        return view('report.report_listCoordinator', compact('report'));
    }
    //To view page for Dean
    public function ReportProposedDean()
    { 
        $report = ProposeReport::all();
        return view('report.report_listDean', compact('report'));
    }

    public function show($id)
    {
        //view details of the report
        $report = ReportModel::find($id);
        return view('report.show_report', compact('report'));
    }

    public function showReport()
    {
        $report = ReportModel::all();
        return view(('report.report_view'), compact('report'));
    }

    public function createReport()
    {
         return view('report.create_report');
    }

    public function editReport($id)
    {
        $report = ReportModel::find($id);
        return view('report.edit_report', compact('report'));

    }
    public function store(Request $request)
    {
        // $report = new ReportModel();
        // $report->ReportCreator_name = $request->ReportCreator_name;
        // $report->Report_Title = $request->Report_Title;
        // $report->Report_date = $request->Report_date;
        // $report->Report_objective = $request->Report_objective;
        // $report->Report_description = $request->Report_description;
        // $report->save();
        ReportModel::create($request->all());
        return redirect()->route('report.view')->with('success', 'Successfully added');
    }
    public function update(ReportRequest $request, $id)
    {
        $report = ReportModel::find($id);
        $reportSubmit = SubmitReport::where('report_id', '=', $report->id);
        $reportSubmit->delete();

        $report->update($request->all());
        $report->statusapprovalbyHOSD = "";
        $report->statusapprovalbyCoordinator = "";
        $report->statusapprovalbyDean = "";

        return redirect()->route('report.view')->with('success', 'Successfully updated');
    }

    public function destroy($id)
    {
        $report = ReportModel::find($id);
        $report->delete();
        $report->submit->delete();

        return back ()->with('success', 'Successfully deleted');
    }

    public function approveReportHOSD($id)
    {
        $report = ReportModel::find($id);
        $report->statusbyHOSD = "Approved";
        $report->save();

        return back()->with('success', 'Successfully approved');
    }

    public function rejectReportHOSD($id)
    {
        $report = ReportModel::find($id);
        $report->statusbyHOSD = "Rejected";
        $report->save();

        return back()->with('success', 'Successfully rejected');
    }


    public function approveReportCoordinator($id)
    {
        $report = ReportModel::find($id);
        $report->statusbyCoordinator = "Approved";
        $report->save();

        return back()->with('success', 'Successfully approved');
    }

    public function rejectReportCoordinator($id)
    {
        $report = ReportModel::find($id);
        $report->statusbyCoordinator = "Rejected";
        $report->save();

        return back()->with('success', 'Successfully rejected');
    }

    public function confirmReportDean($id)
    {
        $report = ReportModel::find($id);
        $report->statusbyDean = "Confirm";
        $report->save();

        return back()->with('success', 'Successfully confirm');
    }

    public function denyReportDean($id)
    {
        $report = ReportModel::find($id);
        $report->statusbyDean = "Deny";
        $report->save();

        return back()->with('success', 'Successfully deny');
    }

    public function showDelete($id){

        $report = ReportModel::find($id);
        return view('report.delete_report', compact('report'));
    }
}
