<!--View Report ----->

@extends('layout.master')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


@section('content')

<section class="p-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="text-center">
            <span class="display-2 fw-semibold ">{{ $report->Report_Title }}</span>

            
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Date
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ \Carbon\Carbon::parse($report->Report_date)->format('j F, Y') }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5">
                <div class="col col-lg-2 text-end fw-semibold">
                    Report Creator Name
                </div>
                <div class="col-md-auto text-start ">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $report->ReportCreator_name }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5 mt-3">
                <div class="col col-lg-2 text-end fw-semibold">
                    Report Objective
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $report->Report_objective }}
                </div>
            </div>
            <div class="row justify-content-md-center fs-5 mt-3">
                <div class="col col-lg-2 text-end fw-semibold">
                    Report Description
                </div>
                <div class="col-md-auto text-start">
                    :
                </div>
                <div class="col col-lg-6 text-start">
                    {{ $report->Report_description }}
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection