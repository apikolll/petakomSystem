@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }}</div>

                <div class="card-body">
                    <center><input type="search" id="gsearch" name="gsearch" style="width:70%">
                        <input type="submit">
                    </center>
                </div>

            </div><br>
            <center>
                <h2><strong>VOTE FOR ELECTION</strong></h2>
            </center>
            <center>
                <h4>Faculty of Computing</h4>
            </center><br>
            <div class="card">
                <div class="card-header">{{ __('Candidate Information') }}</div>
                <div class="card-body">
                    <!--calls update function from controller-->
                    <form action="{{ route('update', $election->id) }}" method="POST" enctype="multipart/form-data">
                        <center>
                            {{-- {{dd($election->id)}} --}}
                            @csrf
                            {{-- @method('PUT') --}}
                            <table style="width:80%">
                                <br>
                                <!--display data from database-->
                                <tr>
                                    <th>Profile Image:</th>
                                    <td><input type="file" id="myFile" name="profile_img" required></td>
                                </tr>
                                <tr>
                                    <th>Student ID:</th>
                                    <td><input type="text" id="name" name="student_ID" a style="width:100%" value="{{$election ->student_ID}}" required></td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td><input type="text" id="year" name="full_name" style="width:100%" value="{{$election ->full_name}}" required></td>
                                </tr>
                                <tr>
                                    <th>Current Semester:</th>
                                    <td><input type="text" id="address" name="crt_semester" style="width:100%" value="{{$election ->crt_semester}}" required></td>
                                </tr>
                                <tr>
                                    <th>Current Result:</th>
                                    <td><input type="text" id="phone" name="crt_result" style="width:100%" value="{{$election ->crt_result}}" required></td>
                                </tr>
                                <tr>
                                    <th>Previous Activities:</th>
                                    <td><input type="text" id="phone" name="prv_activities" style="width:100%" value="{{$election ->prv_activities}}" required></td>
                                </tr>
                                <tr>
                                    <th>Manifesto:</th>
                                    <td style="width:70%"><textarea id="w3review" name="manifesto" rows="4" cols="50" required>{{$election ->manifesto}}</textarea></td>
                                </tr>
                            </table>
                        </center><br>
                        <!--update button-->
                        <center><button style="width:70%;" class="btn btn-primary">Update Registration</button></center><br>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>
</div>
@endsection