@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
  <div class="jumbotron text-center">
    <div class="container">
      <p class="lead">Your profile picture has been updated!</p>
        <a href="{{ url('/profile') }}" type="button" class="btn btn-default">Back to Profile</a>
    </div>
  </div>

@endsection
