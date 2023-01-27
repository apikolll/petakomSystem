@extends('layout.master')

@section('content')

<section class="p-5">
    <div class="container">
        <div class="text-center">
            <span class="fw-semibold display-2">Activities</span>
            <p class="lead text-muted">Let's create more activity for the community of FK.</p>
        </div>

        <a href="{{ route('activity.create') }}" class="btn btn-warning p-2 mb-3 fw-semibold">Create new activity</a>

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
                                <th>Start Date</th>
                                <th>HOSD Approval</th>
                                <th>Coordinator Approval</th>
                                <th>Dean Approval</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            @if (count($activity) > 0)
                            @foreach ($activity as $activities)
                            <tr>
                                <td>{{ $activities->id }}</td>
                                <td>{{ $activities->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($activities->startdate)->format('j F, Y') }}</td>
                                <td>
                                    @if ($activities->HOSD == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $activities->HOSD }}
                                    </div>
                                    @elseif ($activities->HOSD == "Approved")
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $activities->HOSD }}
                                    </div>
                                    @elseif ($activities->propose)
                                    <div class="badge bg-warning text-wrap text-dark" style="width: 6rem;">
                                        Pending
                                    </div>
                                    @else
                                    <div class="badge bg-primary text-wrap text-light" style="width: 6rem;">
                                        Waiting...
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($activities->Coordinator == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $activities->Coordinator }}
                                    </div>
                                    @elseif ($activities->Coordinator == "Approved")
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $activities->Coordinator }}
                                    </div>
                                    @elseif ($activities->propose)
                                    <div class="badge bg-warning text-wrap text-dark" style="width: 6rem;">
                                        Pending
                                    </div>
                                    @else
                                    <div class="badge bg-primary text-wrap text-light" style="width: 6rem;">
                                        Waiting...
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($activities->Dean == "Rejected")
                                    <div class="badge bg-danger text-wrap" style="width: 6rem;">
                                        {{ $activities->Dean }}
                                    </div>
                                    @elseif ($activities->Dean == "Approved")
                                    <div class="badge bg-success text-wrap" style="width: 6rem;">
                                        {{ $activities->Dean }}
                                    </div>
                                    @elseif ($activities->propose)
                                    <div class="badge bg-warning text-wrap text-dark" style="width: 6rem;">
                                        Pending
                                    </div>
                                    @else
                                    <div class="badge bg-primary text-wrap text-light" style="width: 6rem;">
                                        Waiting...
                                    </div>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('activity.show', $activities->id) }}"
                                        class="text-decoration-none btn btn-outline-success">View</a>

                                    @if (!$activities->propose || $activities->status == "Rejected")
                                    <a href="{{ route('activity.edit', $activities->id) }}"
                                        class="text-decoration-none btn btn-warning">Edit activity</a>
                                    <a href="{{ route('propose.activity', $activities->id) }}"
                                        class="text-decoration-none btn btn-primary">Propose</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $activities->id }}">Delete</a>
                                    @else
                                    <a href="{{ route('activity.edit', $activities->id) }}"
                                        class="text-decoration-none btn btn-warning disabled">Edit activity</a>
                                    <a href="{{ route('propose.activity', $activities->id) }}"
                                        class="text-decoration-none btn btn-primary disabled">Propose</a>
                                    <a href="#" class="btn btn-danger disabled" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete{{ $activities->id }}">Delete</a>
                                    @endif


                                </td>
                                @include('activity.delete')
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