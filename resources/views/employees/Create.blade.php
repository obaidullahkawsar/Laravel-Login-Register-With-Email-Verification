@extends('layouts.master')
@section('content')
<div class="card">
  <div class="card-header">Employees Page</div>
  <div class="card-body">
      
      <form action="{{ url('employee') }}" method="post">
        {!! csrf_field() !!}
        <label>First Name:</label></br>
        <input type="text" name="firstname" id="firstname" required class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="lastname" id="lastname" required class="form-control"></br>
        <label>Email</label></br>
        <input type="email" name="email" id="email" required class="form-control"></br>
        <label>Salary</label></br>
        <input type="number" name="salary" id="salary" required class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop