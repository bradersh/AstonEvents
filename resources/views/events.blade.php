@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">Events</div>
        <div class="panel-body">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <p>You are logged in! <br/>Use this area to add any upcoming events</p>
          {!! Form::open(array('route' => 'events.add', 'method'=>'POST','files'=>'true')) !!}
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              @if (Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
              @elseif (Session::has('warning'))
              <div class="alert alert-danger">
                {{ Session::get('warning') }}
              </div>
              @endif
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                {!! Form::label('event_name', 'Event Name') !!}
                <div class="">
                  {!! Form::text('event_name', null, ['class'=> 'form-control']) !!}
                  {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>

            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                {!! Form::label('start_date', 'Start Date') !!}
                <div class="">
                  {!! Form::date('start_date', null, ['class'=> 'form-control']) !!}
                  {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                {!! Form::label('end_date', 'End Date') !!}
                <div class="">
                  {!! Form::date('end_date', null, ['class'=> 'form-control']) !!}
                  {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                {!! Form::label('event_description', 'Event Description') !!}
                <div class="">
                  {!! Form::text('event_description', null, ['class'=> 'form-control']) !!}
                  {!! $errors->first('event_description', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                {!! Form::label('event_type', 'Event Type') !!}
                <div class="">
                  {!! Form::select('event_type', ['Sport' => 'Sport', 'Culture' => 'Culture', 'Other' => 'Other'], null, ['class'=> 'form-control']) !!}
                  {!! $errors->first('event_type', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            {!! Form::hidden('event_organiser', Auth::user()->id, ['class'=> 'form-control']) !!}

            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                {!! Form::label('event_location', 'Event Location') !!}
                <div class="">
                  {!! Form::text('event_location', null, ['class'=> 'form-control']) !!}
                  {!! $errors->first('event_location', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                {!! Form::label('event_avatar', 'Event Avatar') !!}
                <div class="">
                  <input type="file" name="event_avatar" accept="image/*">
                  {!! $errors->first('event_avatar', '<p class="alert alert-danger">:message</p>') !!}
                </div>
              </div>
            </div>



            <div class="col-xs-1 col-sm-1 col-md-1 text center float"> &nbsp; <br/>
              {!! Form::submit('Add Event',['class'=>'btn btn-primary']) !!}
            </div>

          </div>
          {!! Form::close() !!}
        </div>
      </div>
      <div class="panel panel-primary">
        <div class"panel-heading">
          Event Calendar
        </div>
        <div class"panel-body">
          {!! $calendar_details->calendar() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
