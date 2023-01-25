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
                <h2><strong>ELECTION CANDIDATE LIST</strong></h2>
            </center>
            <center>
                <h4>Faculty of Computing</h4>
            </center><br>
            <div class="card">
                <div class="card-header">{{ __('List of Election Candidate') }}</div>
                <div class="card-body">


                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Year</th>
                                <th scope="col"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider align-middle">

                            @foreach($election as $key=>$data)
                            <tr id="row{{ $data->id }}">
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->full_name }}</td>
                                <td>{{ $data->crt_semester }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a class="btn btn-success" href="/hosdInfo">View Details</a>
                                    <a class="btn btn-success" href="{{ route('approval', $data->id) }}">Approve</a>
                                    <a class="btn btn-success" href="/studList">Reject</a>
                                </td> 
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection