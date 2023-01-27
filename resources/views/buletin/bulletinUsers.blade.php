@extends('layout.master')
@section('content')
<title>Bulletin</title>

<!-- search -->
<div class="container">
    <div class="box">
    <form action="/searchNewsUser" method="GET" role="search">
            <h1 style="margin-left:50px;margin-top:20px;">SEARCH</h1>
            <p style="margin-left:50px;">Search news by title <br>or author name</p>
          <div class="search">
            <input type="search" name="searchquery" value="{{ Request::get('searchquery') }}" class="form-control" placeholder="search by news title or author name">
            <i class="fa fa-search"></i>
          </div><!-- search -->     
      </form>
    </div>  
</div><br><br>

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
                                @forelse($bulletin as $item)
                                    <tr>
                                    <td>
                                        <span style="text-transform:uppercase;font-weight:bold;">{{ $item->news_title }}</span><br>
                                        By 
                                        <span style="text-transform:capitalize;font-weight:bold;">{{ $item->author_name }}</span> 
                                        - <span style="color:#4169E1;font-weight:bold;">{{date('d F, Y' ,strtotime($item->created_at)) }}</span>
                                    </td>
                                        <td>
                                            <!-- Buttons -->
                                            <a href="/bulletin/{{$item->id}}/show" title="View"><button style="margin-top:7px;margin-right:-40px;" class="btn btn-info btn-sm"><b>View</b>
                                        </button></a>
                                        </td>
                                        </td>
                                    </tr>
                                    <!-- If no record yet -->
                                    @empty
                                        <td><h1 style="text-align:center;">No Records Yet</h1></td>
                                @endforelse
                                </tbody>
                            </table>
                        </div><!-- end table responsive -->
                    </div><!-- end container table -->
        </div><!-- end row -->
</div><!-- end container -->
@endsection