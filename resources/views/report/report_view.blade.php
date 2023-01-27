@extends('layout.master')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Reports</span>

        </div>

        <a href="{{ route('report.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">Create new report</a>

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
                                <th>Status by HOSD</th>
                                <th>Status by Coordinator</th>
                                <th>Status by Dean</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if (count($report) > 0)
                            @foreach ($report as $reports)
                            <tr>
                                <td>{{ $reports->id }}</td>
                                <td>{{ $reports->Report_Title }}</td>
                                <td>{{ \Carbon\Carbon::parse($reports->Report_date)->format('j F, Y') }}</td>
                                <td>
                                    @if ($reports->statusbyHOSD == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $reports->statusbyHOSD }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $reports->statusbyHOSD }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($reports->statusbyCoordinator == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $reports->statusbyCoordinator }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $reports->statusbyCoordinator }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($reports->statusbyDean == "Deny")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $reports->statusbyDean }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $reports->statusbyDean }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('report.show', $reports->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>


                                    @if ($reports->statusbyHOSD == "Rejected" || $reports->statusbyCoordinator ==
                                    "Rejected" || $reports->statusbyDean== "Deny")
                                    <a href="{{ route('propose.activity', $reports->id) }}"
                                        class="text-decoration-none btn btn-primary">Propose</a>
                                    <a href="{{ route('report.edit', $reports->id) }}"
                                        class="text-decoration-none btn btn-warning">Edit Report</a>

                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $reports->id }}">Delete</a>
                                    @else
                                    <a href="{{ route('propose.report', $reports->id) }}"
                                        class="text-decoration-none btn btn-primary ">Propose</a>
                                    <a href="{{ route('report.edit', $reports->id) }}"
                                        class="text-decoration-none btn btn-warning disabled">Edit Report</a>
                                    <a href="#" class="btn btn-danger disabled" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $reports->id }}">Delete</a>
                                    @endif


                                </td>
                                @include('report.delete_report')
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