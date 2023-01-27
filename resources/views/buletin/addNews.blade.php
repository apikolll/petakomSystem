@extends('layout.master')
@section('content')

<style>
  a:link { text-decoration: none; }
  a:hover { text-decoration: underline; }
</style>

<title>Bulletin | Create News</title>

<div class="container">
<div style="border-color:white;" class="card">
  <!-- card header -->
  <div style="border-color:white;font-weight:bold;" class="card-header">
    <a href="{{ url('committee/bulletin') }}">Bulletin</a>
     / 
    <a href="{{ url('committee/create') }}">Create News</a>
  </div>
  <!-- card body -->
  <div class="card-body">
      <!-- form -->
      <form action="/committee/bulletin/store" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <!-- author details section -->
        <p class="hidden">Author Details</p>

        <!-- author name -->
        <label><b>Author Name <span style="color:red;">*</span></b></label></br>
        <input type="text" name="author_name" id="author_name" class="form-control" value="{{ Auth::user()->Fname }}" required><br><br>

        <!-- news details section -->
        <p class="hidden">News Details</p>

        <!-- news title -->
        <label><b>News Title <span style="color:red;">*</span></b></label><br>
        <input type="text" name="news_title" id="news_title" class="form-control" required><br>
        
        <!-- description -->
        <label><b>Description <span style="color:red;">*</span></b></label></br>
        <textarea type="text" name="news_description" id="news_description" class="form-control" required></textarea><br>

        <!-- button submit -->
        <input type="submit" value="Save" style="width: 100%;" class="btn btn-success"><br>
    </form><!-- end form -->
  </div><!-- end card body -->
</div><!-- end card -->
</div><!-- end container -->
@stop
