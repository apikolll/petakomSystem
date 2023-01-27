@extends('layout.master')
@section('content')
<title>Bulletin</title>

<!-- search -->
<div class="container">
    <div class="box">
    <form action="/committee/searchNewsPetakom" method="GET" role="search">
            <h1 style="margin-left:50px;margin-top:20px;">SEARCH</h1>
            <p style="margin-left:50px;">Search news by title <br>or author name</p>
          <div class="search">
            <input type="search" name="searchquery" value="{{ Request::get('searchquery') }}" class="form-control" placeholder="search by news title or author name">
            <i class="fa fa-search"></i>
          </div><!-- search -->     
      </form>
    </div>  
</div><br><br>

<div class="container">
<!-- add new record button -->
<div style="margin-left:25px;">
<a href="/committee/create" button class="btn btn-warning btn-sm" title="Add New Data">
    <b><i class="fa fa-plus"></i> New News</b>
</a>
</div>
</div><br>

<!-- table -->
<div class="container">
        <div class="row">
            <div class="col-12">
                    <!-- table container -->
                    <div class = "container">

                        <!-- to alert the users -->
                        @if(session('flash_message'))
                         <div class="alert alert-success" role="alert">
                           {{session('flash_message')}}
                         </div>
                        @endif

                        <!-- Table -->
                        <div class="table-responsive">
                           <table class="table table-bordered">
                                <tbody>
                                <!-- Get Data From Database -->
                                @forelse($searchNews as $item)
                                    <tr>
                                    <td>
                                        <span style="text-transform:uppercase;font-weight:bold;">{{ $item->news_title }}</span><br>
                                        By 
                                        <span style="text-transform:capitalize;font-weight:bold;">{{ $item->author_name }}</span> 
                                        - <span style="color:#4169E1;font-weight:bold;">{{date('d F, Y' ,strtotime($item->created_at)) }}</span>
                                    </td>
                                        <td>
                                            <!-- Buttons -->
                                            <a href="/committee/bulletin/{{$item->id}}/show" title="View"><button style="margin-top:7px;margin-right:-35px;font-weight:bold;" class="btn btn-info btn-sm">View
                                        </button></a>
                                        </td>
                                        <td><a href="/committee/bulletin/{{$item->id}}/edit" title="Edit"><button style="margin-top:7px;margin-right:-30px;font-weight:bold;color:black;" class="btn btn-primary btn-sm">Edit</button></a></td>
                                        <td>
                                        <a href="/committee/bulletin/{{$item->id}}/delete" title="Delete"><button style="margin-top:7px;margin-right:-40px;font-weight:bold;color:black;" class="btn btn-danger btn-sm" 
                                            onClick = "return confirm('Are you sure you want to delete this data?')">Delete</button></a>
                                        </td>
                                    </tr>
                                    <!-- If no record found -->
                                    @empty
                                        <td><h1 style="text-align:center;">No Records Found</h1></td>
                                @endforelse
                                </tbody>
                            </table>
                        </div><!-- end table responsive -->
                    </div><!-- end container-->
        </div><!-- end row -->
</div><!-- end container -->
@endsection