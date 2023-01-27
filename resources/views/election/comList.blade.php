@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <center>
                <h2><strong>ELECTION COMMITTEE LIST VIEW</strong></h2>
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
                                <th scope="col">Student ID</th>
                                <th scope="col">Total Vote</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider align-middle">
                            <!--display data from database-->
                            @foreach($election as $key=>$data)
                            <tr id="row{{ $data->id }}">
                                <th scope="row">{{ $data->id }}</th>
                                <td style="text-align:left">{{ $data->full_name }}</td>
                                <td>{{ $data->student_ID }}</td>
                                <td>{{ $data->total_vote }}
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{ route('election.comInfo', $data->id) }}">View Details</a><!--View Details button-->
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