@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Search') }}</div>

                <div class="card-body">
                    <center><input type="search" id="gsearch" name="gsearch" style="width:70%">
                    <input type="submit"></center>
                </div>

            </div><br>
            <center><h2><strong>ELECTION REGISTRATION</strong></h2></center><br>
            <div class="card">

                <div class="card-body">
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                <center><table style="width:80%">
                    <br><tr>
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
                    </table></center><br>
                    <center><input type="submit" style="width:70%; background-color:forestgreen; color:aliceblue"></center><br> <!--registration-->
                    <center><button style="width:70%; background-color:firebrick; color:aliceblue">Cancel</button></center></form> <!--Go to dashboard.Student-->
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
