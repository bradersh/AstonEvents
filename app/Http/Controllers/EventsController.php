<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Image;
use App\Events;

use Calendar;

class EventsController extends Controller
{
    public function index(){
      $events = Events::get();
      $event_list = [];
      foreach ($events as $key => $event) {
        $event_list[] = Calendar::event(
          $event->event_name,
          true,
          new \DateTime($event->start_date),
          new \DateTime($event->end_date. ' +1 day')
        );
      }
      $calendar_details = Calendar::addEvents($event_list);

      return view('events', compact('calendar_details') );
    }

    public function addEvent(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'event_name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'event_description' => 'required',
        'event_type' => 'required',
        'event_organiser' => 'required',
        'event_location' => 'required',
        'event_avatar' => 'mimes:jpeg,bmp,png|required',
      ]);

      if ($validator->fails()) {
        \Session::flash('warning', 'Please enter all the required details');
        return Redirect::to('/events')->withInput()->withErrors($validator);
      }

      $event = new Events;
      if($request->hasFile('event_avatar')){
        $avatar = $request->file('event_avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/events/' . $filename ) );

        $event->event_avatar = $filename;
      }
      $event->event_name = $request['event_name'];
      $event->start_date = $request['start_date'];
      $event->end_date = $request['end_date'];
      $event->event_description = $request['event_description'];
      $event->event_type = $request['event_type'];
      $event->event_organiser = $request['event_organiser'];
      $event->event_location = $request['event_location'];
      $event->save();

      \Session::flash('success', 'Event added successfully');
      return Redirect::to('/events');
    }
  }
