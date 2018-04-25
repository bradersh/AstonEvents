<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
class IndexController extends Controller
{
    public function display(Request $request){
      $sort = empty($request->input('order')) ? 'event_name':$request->input('order');
      $events = Events::take(10)->get()->sortBy($sort);
      return view('welcome', ['Events'=>$events]);
      return $sort;
    }

    public function view(Request $request){
        $events = Events::find($request->input('id'));
        return view('view', array('event'=>$events));
    }
}
