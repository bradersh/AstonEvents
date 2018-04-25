@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <img src="{{ asset('uploads/avatars/'.$user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
      <h3>{{ $user->name}}'s Profile</h3>
      <form enctype="multipart/form-data" action="{{url('/profile')}}" method="POST">
        <label>Update Profile Image</label>
        <input type="file" name="avatar" accept="image/*">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="pull-right btn btn-sm btn-primary">
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <p>
    </br>
    Below are all the events you have created:
  </p>
  </div>
</div>

<div class="container">
  <div class="row">
    @foreach($Events as $event)
    <div class="panel panel-default">
      <div class="panel-heading">{{$event->event_name}}</div>
      <div class="panel-body">
        <ul>
          <img src="{{ asset('uploads/events/'.$event->event_avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
          Start date: {{$event->start_date}} </br>
          End Date: {{$event->end_date}} </br>
          Event Description: {{$event->event_description}} </br>
          Event Type: {{$event->event_type}} </br>
          Event Organiser: {{$event->user->name}} </br>
          Event Location: {{$event->event_location}} </br>
          Event Likes: {{$event->event_likes}} </br>
        </ul>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
