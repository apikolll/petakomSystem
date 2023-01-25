<!-- This is where view list of proposal, approve or decline report for Coordinator  -->

@extends('layouts.app')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Proposal</span>
        </div>

        {{-- <a href="{{ route('report.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">Create new
            proposal</a> --}}

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
                                <th>Proposal</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if (count($proposal) > 0)
                            @foreach ($proposal as $proposals)
                            <tr class="align-middle">
                                <td>{{ $proposals->id }}</td>
                                <td>{{ $proposals->proposal->Proposal_Title }}</td>
                                <td>{{ \Carbon\Carbon::parse($proposals->proposal->Proposal_date)->format('j F, Y') }}</td>
                                <td>
                                    @if ($proposals->proposals->statusbyCoordinator == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $proposals->proposal->statusbyCoordinator }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $proposals->proposal->statusbyCoordinator }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('proposal.show', $proposals->Proposal->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>
                                    <a href="{{ route('ProposalCoordinator.approve', $proposals->proposal->id) }}"
                                        class="text-decoration-none btn btn-primary">Approve</a>
                                    <a href="{{ route('ReportCoordinator.reject', $proposals->proposal->id) }}"
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