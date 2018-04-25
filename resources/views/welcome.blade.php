@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
  <div class="jumbotron text-center">
    <div class="container">
      <h1>Welcome To Our New Aston Events Site</h1>
      <p class="lead">Our brand new Aston Events website lets you browse upcoming events!</br>
         If you would like to become an event organiser, register for an account</p>
    </div>
  </div>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Events Page</div>
      <div class="panel-body">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort By
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
            <li><a href="{{ url()->current().'?order=event_name'}}">Event Name</a></li>
            <li><a href="{{ url()->current().'?order=event_type'}}">Event Type</a></li>
            <li><a href="{{ url()->current().'?order=start_date'}}">Event Start Date</a></li>
          </ul>
        </div>
        <h4>Please see our listed events below</h4>
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
          </br>
            <a href="{{ url('/view').'?id='.$event->id }}" type="button" class="btn btn-default">View Event</a>
            </ul>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
