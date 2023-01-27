@extends('layout.master')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Activities</span>
            <p class="lead text-muted">These are the list of propose activities by the lecturers and students</p>
        </div>

        {{-- <a href="{{ route('activity.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">Create new
            activity</a> --}}

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
                                <th>Activity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if (count($activity) > 0)
                            @foreach ($activity as $activities)
                            <tr class="align-middle">
                                <td>{{ $activities->id }}</td>
                                <td>{{ $activities->activity->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($activities->activity->date)->format('j F, Y') }}</td>
                                <td>
                                    @if ($activities->activity->Dean == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $activities->activity->Dean }}
                                    </div>
                                    @else
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $activities->activity->Dean }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('activity.show', $activities->Activity->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>
                                    <a href="{{ route('dean.approve', $activities->activity->id) }}"
                                        class="text-decoration-none btn btn-primary">Approve</a>
                                    <a href="{{ route('dean.reject', $activities->activity->id) }}"
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