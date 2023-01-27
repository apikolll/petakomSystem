@extends('layout.master')


@section('content')

<section class="p-5">
    <div class="container">
        <a href="{{ URL::previous() }}" class="text-decoration-none text-dark">
            <i class="bi bi-arrow-left-circle-fill h3"></i>
        </a>
        <div class="card mx-auto" style="max-width: 50rem;">
            <div class="card-body">
                <div class="d-flex gap-3">
                    <div class="card d-none d-md-block w-50">
                        <div class="card-body">
                            <span class="display-3 fw-semibold">Edit <br> Report.</span>
                        </div>
                    </div>
                    <div class="card-text w-75">
                        <form action="{{ route('update.report', $report->id) }}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="ReportCreator_name" id="floatingInput" placeholder="Report Creator Name">
                                <label for="floatingInput">{{ $report->ReportCreator_name }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="Report_Title" id="floatingInput" placeholder="Report Title">
                                <label for="floatingInput">{{ $report->Report_Title }}</label>
                            </div>
                            <div class="d-sm-flex flex-lg-column gap-3">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="Report_date" id="floatingInput" placeholder="Report Date">
                                    <label for="floatingInput">{{ $report->Report_date }}</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="report_objective" id="floatingInput" placeholder="Report objective">
                                <label for="floatingInput">{{ $report->Report_objective }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="report_description" id="floatingInput" placeholder="Report description">
                                <label for="floatingInput">{{ $report->Report_description }}</label>
                            </div>
                            <button class="btn btn-primary w-100 p-2 fs-5">Update</button>
                        </form>
                    </div>
                </div>
            </div>