@extends('layouts.app')


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
                            <span class="display-3 fw-semibold">Edit <br> Proposal.</span>
                        </div>
                    </div>
                    <div class="card-text w-75">
                        <form action="{{ route('update.proposal', $proposal->id) }}" method="post">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="ProposalCreator_name" id="floatingInput" placeholder="Proposal Creator Name">
                                <label for="floatingInput">{{ $proposal->ProposalCreator_name }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="Proposal_Title" id="floatingInput" placeholder="Proposal Title">
                                <label for="floatingInput">{{ $proposal->Proposal_Title }}</label>
                            </div>
                            <div class="d-sm-flex flex-lg-column gap-3">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="Proposal_date" id="floatingInput" placeholder="Report Date">
                                    <label for="floatingInput">{{ $proposal->Proposal_date }}</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="report_objective" id="floatingInput" placeholder="Proposal objective">
                                <label for="floatingInput">{{ $proposal->Proposal_objective }}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="report_description" id="floatingInput" placeholder="Proposal description">
                                <label for="floatingInput">{{ $proposal->Proposal_description }}</label>
                            </div>
                            <button class="btn btn-primary w-100 p-2 fs-5">Update</button>
                        </form>
                    </div>
                </div>
            </div>