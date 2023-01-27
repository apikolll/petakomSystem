<!-- This is where view list of report, approve or decline report for HOSD  -->

@extends('layout.master')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Reports</span>
        </div>

        {{-- <a href="{{ route('report.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">Create new
            report</a> --}}

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card mx-auto p-3">
            <div class="card-body">
                <div class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Report</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if (count($report) > 0)
                            @foreach ($report as $reports)
                            <tr class="align-middle">
                                <td>{{ $reports->id }}</td>
                                <td>{{ $reports->report->Report_Title }}</td>
                                <td>{{ \Carbon\Carbon::parse($reports->report->Report_date)->format('j F, Y') }}</td>
                                <td>
                                    @if ($reports->report->statusbyHOSD == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $reports->report->statusbyHOSD }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $reports->report->statusbyHOSD }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('report.show', $reports->Report->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>
                                    <a href="{{ route('ReportHOSD.approve', $reports->report->id) }}"
                                        class="text-decoration-none btn btn-primary">Approve</a>
                                    <a href="{{ route('ReportHOSD.reject', $reports->report->id) }}"
                                        class="text-decoration-none btn btn-danger">Reject</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No Data Available</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</section>

@endsection