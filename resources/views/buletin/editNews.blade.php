@extends('layout.master')
@section('content')

<style>
  a:link { text-decoration: none; }
  a:hover { text-decoration: underline; }
</style>

<title>Bulletin | Edit News</title>

<div class="container">
<div style="border-color:white;font-weight:bold;" class="card">
  <!-- card header -->
  <div style="border-color:white;font-weight:bold;" class="card-header">  
    <a href="{{ url('committee/bulletin') }}">Bulletin</a>
     / 
    <a href="">Edit News</a>
  </div>
  <!-- card body -->
  <div style="border-color:white;" class="card-body">
      <!-- form -->
      <form action="/committee/bulletin/{{$bulletin->id}}/update" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <!-- bulletin id -->
        <input type="hidden" name="id" id="id" value="{{$bulletin->id}}" id="id" />

        <!-- author details section -->
        <p class="hidden">Author Details</p>

        <!-- author name -->
        <label><b>Author Name <span style="color:red;">*</span></b></label></br>
        <input type="text" name="author_name" id="author_name" class="form-control" value="{{$bulletin->author_name}}" required><br><br>

        <!-- news details section -->
        <p class="hidden">News Details</p>

        <!-- news title -->
        <label><b>News Title <span style="color:red;">*</span></b></label></br>
        <input type="text" name="news_title" id="news_title" class="form-control" value="{{$bulletin->news_title}}" required><br>

        <!-- description -->
        <label><b>Description <span style="color:red;">*</span></b></label></br>
        <textarea name="news_description" id="news_description" class="form-control" cols=139  rows=15 required>{{$bulletin->news_description}}"</textarea><br>

        <!-- edited by -->
        <label><b>Edited By <span style="color:red;">*</span></b></label></br>
        <input type="text" name="updateBy" id="updateBy" class="form-control" value="{{ Auth::user()->Fname }}" readonly><br><br>

        <!-- button submit -->
        <input type="submit" value="Update" style="width: 100%;" class="btn btn-success"><br>
    </form><!-- end form -->
  
  </div><!-- end card body -->
</div><!-- end card -->
</div><!-- end container -->
@stop