@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
            <center>
                <h2><strong>My Profile</strong></h2>
            </center>

            
            <div class="card">
                <div class="card-header">{{ __('Profile Settings') }}</div>
                <div class="card-body">

       
                    <center>
                        <table style="width:80%">
                            <br>
                            <tr>
                                <th>Profile Image:</th>
                                <td><input type="file" id="myFile" name="filename"></td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td><?php echo "Hello world!<br>"; ?></td> <!--output from database-->
                            </tr>
                            <tr>
                                <th>Year:</th>
                                <td><?php echo "Hello world!<br>"; ?></td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td><?php echo "Hello world!<br>"; ?></td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td><?php echo "Hello world!<br>"; ?></td>
                            </tr>
                
                        </table>
                    </center><br>
                    <center><button style="width:70%; background-color:gray">Save Profile</button></center><br>

                </div>


            </div>

        </div>
    </div>
</div>
</div>
@endsection