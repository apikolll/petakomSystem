@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <center>
                <h2><strong>ELECTION CANDIDATE LIST</strong></h2>
            </center>
            <center>
                <h4>Faculty of Computing</h4>
            </center><br>
            <!--if user is a first time voter-->
            @if(! $voter)
            <div class="card">
                <div class="card-header">{{ __('List of Election Candidate') }}</div>
                <div class="card-body">
                    <table class="table text-center">

                        @foreach($election as $key=>$data)
                        <tr id="row{{ $data->id }}" style="text-align: left;">
                            <!--merge row-->
                            <td rowspan="3">
                                <center>
                                    <!--display profile image from database-->
                                    <img style="height:150px" src="{{ asset('assets') }}/{{ $data->profile_img }}"><br><br>
                                    <!--vote button (calls voter function from controller)-->
                                    <a class="btn btn-primary" href="{{ route('voter', $data->id) }}" style="width:100px">VOTE</a>
                                </center>
                            </td>
                            <td><strong><a>NAME</a></strong><br>{{ $data->full_name }} </td>
                            <td><strong><a>STUDENT ID</a></strong><br>{{ $data->student_ID }}</td>
                        <tr><!--merge column-->
                            <td colspan="2" style="text-align: left; width:200px"><strong><a>PREVIOUS ACTIVITIES</a></strong><br>{{ $data->prv_activities }}</td>
                        </tr>
                        <tr><!--merge column-->
                            <td colspan="2" style="text-align: left; width:200px"><strong><a>MANIFESTO</a></strong><br>{{ $data->manifesto }}</td>
                        </tr>
                        <tbody class="table-group-divider align-middle">
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--if user are already voted-->
            @elseif($voter)
            <br>
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>You have already voted.</h3>
                    </center>
                </div>
                <div class="card-body">
                    <!--background image in card-->
                    <img src="{{ asset('image/bck.png') }}" alt="background" style="width: 700px;">
                </div>
            </div>
        </div>
        @endif
    </div>


</div>
@endsection