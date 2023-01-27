@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <center>
                <h2><strong>ELECTION INFO FOR COORDINATOR</strong></h2>
            </center>
            <center>
                <h4>Faculty of Computing</h4>
            </center><br>
            <div class="card">
                <div class="card-header">{{ __('Candidate Information') }}</div>
                <div class="card-body">
                    <center>
                        <table style="width:80%">
                            <br>
                            <center><img style="height:200px" src="{{ asset('assets') }}/{{ $election->profile_img }}"></center><br><br>
                            <tr>
                                <th style="width:40%">Student ID:</th>
                                <td>{{ $election->student_ID }}</td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $election->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Current Semester:</th>
                                <td>{{ $election->crt_semester }}</td>
                            </tr>
                            <tr>
                                <th>Current Result:</th>
                                <td>{{ $election->crt_result }}</td>
                            </tr>
                            <tr>
                                <th>Previous Activities:</th>
                                <td>{{ $election->prv_activities }}</td>
                            </tr>
                            <tr>
                                <th>Manifesto:</th>
                                <td>{{ $election->manifesto }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>{{ $election->status }}</td>
                            </tr>
                        </table>
                    </center><br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection