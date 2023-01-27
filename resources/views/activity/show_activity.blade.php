@extends('layout.master')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


@section('content')

{{-- <section class="p-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="text-center">
            <span class="display-2 fw-semibold ">{{ $activity->name }}</span>

            <div class="row justify-content-md-center fs-5 mt-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Time
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ \Carbon\Carbon::createFromFormat('H:i:s',$activity->time)->format('h:i A')}}
                    {{ $activity->time }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Date
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ \Carbon\Carbon::parse($activity->date)->format('j F, Y') }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Venue
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->venue }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Organizer
                </div>
                <div class="col-md-auto text-start ">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->organizer_name }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5 mt-3">
                <div class="col col-lg-2 text-end fw-semibold">
                    Objective
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->objective }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5 mt-3">
                <div class="col col-lg-2 text-end fw-semibold">
                    Description
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $activity->description }}
                </div>
            </div>

        </div>
    </div>
</section> --}}
<section class="pt-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="card p-3" style="margin:auto;width:100%;max-width:700px;">
            <div class="card-body">
                <div class="card-text">
                    <div class="row mb-3">
                        <div class="col-6">
                            <span class="text-muted">Activity ID</span><br>
                            <p class="badge bg-info">{{ $activity->id }}</p>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Activity Title</span>
                            <p>{{ $activity->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span class="text-muted">Organizer Name</span><br>
                            <p>{{ $activity->organizer_name }}</p>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Activity Title</span>
                            <p>{{ $activity->name }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span class="text-muted">Start Date</span><br>
                            <p>{{ \Carbon\Carbon::parse($activity->startdate)->format('j F, Y') }}</p>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">End Date</span>
                            <p>{{ \Carbon\Carbon::parse($activity->enddate)->format('j F, Y') }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span class="text-muted">Time</span><br>
                            <p>{{ \Carbon\Carbon::parse($activity->time)->format('h:i A') }}</p>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Venue</span>
                            <p>{{ $activity->venue }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <span class="text-muted">Description</span><br>
                            <p>{{ $activity->description }}</p>
                        </div>
                        <div class="col-6">
                            <span class="text-muted">Objective</span>
                            <p>{{ $activity->objective}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <span class="text-muted">Coordinator Status</span><br>
                            <p>{{ $activity->Coordinator}}</p>
                        </div>
                        <div class="col-4">
                            <span class="text-muted">HOSD Status</span>
                            <p>{{ $activity->HOSD}}</p>
                        </div>
                        <div class="col-4">
                            <span class="text-muted">Dean Status</span>
                            <p>{{ $activity->Dean}}</p>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <span>Created at</span><br>
                    <span class="text-muted">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
                        $activity->created_at)->format('j F, Y h:i A')}}</span>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection