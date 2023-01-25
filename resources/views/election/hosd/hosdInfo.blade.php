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
                            <tr>
                                <th>Manifesto:</th>
                                <td><?php echo "Hello world!<br>"; ?></td>
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