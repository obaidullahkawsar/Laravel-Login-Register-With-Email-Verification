@extends('layouts.master')
@section('content')
<div class="card">
  <div class="card-header"><h3>Edit Employee</h3></div>
  <div class="card-body">
      
  <form action="{{ url('employee/' .$employees->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$employees->id}}" id="id" />
        <label>First Name:</label></br>
        <input type="text" name="firstname" id="firstname" required value="{{$employees->firstname}}"  class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="lastname" id="lastname" required value="{{$employees->lastname}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id="email" required value="{{$employees->email}}" class="form-control"></br>
        <label>Salary</label></br>
        <input type="number" name="salary" id="salary" required value="{{$employees->salary}}" class="form-control"></br>
        <input type="submit" value="Save Changes" class="btn btn-success">
        <a href="/employee" class="btn btn-dark">Back</a>
    </form>
  
  </div>
</div>
@stop