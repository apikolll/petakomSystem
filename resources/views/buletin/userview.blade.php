@extends('layout.master')
@section('content')

<style>
  a:link { text-decoration: none; }
  a:hover { text-decoration: underline; }
</style>

<title>Bulletin | View News</title>

<!-- container -->
<div class="container">
  <!-- card -->
<div style="border-color:white;" class="card">
  <!-- card header -->
  <div style="border-color:white;font-weight:bold;" class="card-header">  
    <a href="{{ url('bulletinUserPage') }}">Bulletin</a>
     / 
    <a href="">{{ $bulletin->news_title }}</a>
  </div>
  <!-- card body -->
  <div class="card-body">
        <!-- news title -->
        <h1 style="text-transform:uppercase;"><b>{{ $bulletin->news_title }}</b></h1>
        <!-- author name, date(created_at) -->
        <p>
          By <span style="text-transform:uppercase;font-weight:bold;">{{ $bulletin->author_name }}</span> 
          - <span style="color:#4169E1;font-weight:bold;">{{date('d F, Y' ,strtotime($bulletin->created_at)) }}</span>

        <!-- edited status -->
        <?php 
          if($bulletin['updateBy']==Null) 
            echo '';
          else 
            echo '<span style="color:blue;float:right;">Edited</span>';
        ?>
        </p>
        <hr>
        <!-- news description -->
        <p>{!! $bulletin->news_description !!}</p><br>
        <hr>
  </div>
      
    </hr>
  
  </div><!-- end card body -->
</div><!-- end card -->
</div><!-- end container -->
@endsection