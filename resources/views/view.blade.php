@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
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
          Event Organiser email: {{$event->user->email}} </br>
          Event Location: {{$event->event_location}} </br>
        </ul>
        <a href="{{ url('/') }}" type="button" class="btn btn-default">Return</a>
      </div>
    </div>
  </div>
</div>
@endsection
