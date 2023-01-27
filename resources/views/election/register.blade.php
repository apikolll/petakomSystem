@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <center>
                <h2><strong>ELECTION REGISTRATION</strong></h2>
            </center><br>
            <!--if not register election-->
            @if(! $election)
            <div class="card">

                <div class="card-body">
                    <!--call store function from controller-->
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <table style="width:80%">
                                <br>
                                <tr>
                                    <th>Profile Image:</th>
                                    <td><input type="file" id="myFile" name="profile_img"></td>
                                </tr>
                                <tr>
                                    <th>Student ID:</th>
                                    <td><input type="text" id="name" name="student_ID" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td><input type="text" id="year" name="full_name" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Current Semester:</th>
                                    <td><input type="text" id="address" name="crt_semester" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Current Result:</th>
                                    <td><input type="text" id="phone" name="crt_result" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Previous Activities:</th>
                                    <td><input type="text" id="phone" name="prv_activities" style="width:100%"></td>
                                </tr>
                                <tr>
                                    <th>Manifesto:</th>
                                    <td style="width:70%"><textarea id="w3review" name="manifesto" rows="4" cols="50"></textarea></td>
                                </tr>
                            </table>
                        </center><br>
                        <!--submit button-->
                        <center><input type="submit" style="width:70%;" class="btn btn-primary"></center><br>
                    </form>
                </div>
            </div>
            <!--if already registered election-->
            @elseif($election)
            <div class="card">
                <div class="card">
                    <div class="card-header" style="background-color:powderblue;">
                        <center>
                            <h3>You have already registered.</h3>
                        </center>
                    </div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Profile Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Matric ID ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider align-middle">
                                <!--display data from database-->
                                @foreach($election_data as $key=>$data)
                                <tr id="row{{ $data->id }}">
                                    <td><img style="height:150px" src="{{ asset('assets') }}/{{ $data->profile_img }}"></td>
                                    <td>{{ $data->full_name }}</td>
                                    <td>{{ $data->student_ID }}</td>
                                    <td>{{ $data->status }}</td>
                                    <!--update button (go to updateReg)-->
                                    <td><a class="btn btn-primary" href="{{ route('election.updateReg', $data->id) }}">Update</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>




                    </div>


                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection