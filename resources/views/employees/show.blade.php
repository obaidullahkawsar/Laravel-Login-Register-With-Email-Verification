@extends('layouts.master')
@section('content')
<div class="card">
  <div class="card-header"><h3>Employee Details</h3></div>
  <div class="card-body">
  
        <div class="card-body">
        <p class="card-text">First Name : {{ $employees->firstname }}</p>
        <hr>
        <p class="card-text">Last Name : {{ $employees->lastname }}</p>
        <hr>
        <p class="card-text">Email : {{ $employees->email }}</p>
        <hr>
        <p class="card-text">Salary : {{ $employees->salary }}</p>

        <a href="/employee" class="btn btn-dark">Back</a>
  </div>
  </div>
</div>
@stop