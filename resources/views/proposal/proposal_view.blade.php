@extends('layouts.app')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Proposals</span>
            
        </div>

        <a href="{{ route('proposal.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">Create new proposal</a>

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
                                <th>Status by HOSD</th>
                                <th>Status by Coordinator</th>
                                <th>Status by Dean</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if (count($proposal) > 0)
                            @foreach ($proposal as $proposals)
                            <tr>
                                <td>{{ $proposals->id }}</td>
                                <td>{{ $proposals->Proposal_Title }}</td>
                                <td>{{ \Carbon\Carbon::parse($proposals->Proposal_date)->format('j F, Y') }}</td>
                                <td>
                                    @if ($proposals->statusbyHOSD == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $proposals->statusbyHOSD }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $proposals->statusbyHOSD }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($proposals->statusbyCoordinator == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $proposals->statusbyCoordinator }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $proposals->statusbyCoordinator }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($proposals->statusbyDean == "Deny")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $proposals->statusbyDean }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $proposals->statusbyDean }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('proposal.show', $proposals->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>

                                    @if ($proposals->statusbyHOSD == "Rejected" || $proposals->statusbyCoordinator == "Rejected" || $proposals->statusbyDean== "Deny")
                                    <a href="{{ route('proposal.edit', $proposals->id) }}"
                                        class="text-decoration-none btn btn-warning">Edit Proposal</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $proposals->id }}">Delete</a>
                                    @else
                                    <a href="{{ route('proposal.edit', $proposals->id) }}"
                                        class="text-decoration-none btn btn-warning disabled">Edit Proposal</a>
                                    <a href="#" class="btn btn-danger disabled" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $proposals->id }}">Delete</a>
                                    @endif


                                </td>
                                @include('proposal.delete_proposal')
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