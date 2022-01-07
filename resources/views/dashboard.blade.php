@extends('layouts.master')
@section('content')
<h1 class="text-success">Dear, {{Auth::user()->name}} Weclome to Admin sensitive page...!</h1>
@stop
