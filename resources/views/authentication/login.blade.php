
@extends('layouts.master')
@section('content')
<div class="row offset-3">
    <div class="col-md-8">
        <div class="card mt-5">
        <div class="card-header text-white bg-success">
        <h4 class="text-center">Login Form</h4>
            @if(Session::has('message'))
                <div class="alert alert-danger">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>  
        <div class="card-body">
            <form action="{{route('login.post')}}" method="POST">
            {!! csrf_field() !!}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                
            
        </div>
        <div class="card-footer bg-success">
        <div class="text-center">
                    <button type="submit" name="login" id="login" class="btn btn-light">Login</button>
                </div>
        </div>
        </div>
        </form>
    </div>
</div>

@stop