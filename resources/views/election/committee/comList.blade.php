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
            <center><h2><strong>ELECTION COMMITTEE LIST VIEW</strong></h2></center>
            <center><h4>Faculty of Computing</h4></center><br>
            <div class="card">
            <div class="card-header">{{ __('List of Election Candidate') }}</div>
                <div class="card-body">
                
               
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Year</th>
                        <th scope="col">Total Votes</th>
                        <th scope="col"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider align-middle">
                    <tr>
                        <th scope="row">1</th> <!--echo from db-->
                        <td>Farra Alia</td>
                        <td>Sem 1 2022/2023</td>
                        <td>67</td>
                        <td><a class="btn btn-success" href="/comInfo">View Details</a></td> <!--go to details page-->

                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Nurain Aleeya</td>
                        <td>Sem 2 2022/2023</td>
                        <td>102</td>
                        <td><a class="btn btn-success" href="#">View Details</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Alia Hidayah</td>
                        <td>Sem 1 2022/2023</td>
                        <td>44</td>
                        <td><a class="btn btn-success" href="#">View Details</a></td> 
                    </tr>
                </tbody>
            </table>
        
                    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection




