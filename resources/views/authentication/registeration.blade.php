@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8 offset-2">
        <div class="card mt-5">
            <div class="card-header bg-success text-white">
            <span id="msgSpn" class="text-center text-white" style="text-size:20px;"></span>
            <div class="alert alert-danger print-error-msg" id="print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <h4 class="text-center">Registeration Form</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="UserName">User Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <span id="spnName" class="text-danger"></span>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <span id="spnEmail" class="text-danger"></span>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <span id="spnPassword" class="text-danger"></span>
            </div>
            <div class="card-footer text-center bg-success text-white">
                <div class="form-group">
                    <button type="submit" name="register" id="register" class="btn btn-light text-center">Register</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@stop