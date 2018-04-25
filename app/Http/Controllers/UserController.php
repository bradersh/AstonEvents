<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use Validator;
use App\Events;

class UserController extends Controller
    {
      public function profile(){

        $my = Events::where('event_organiser',Auth::user()->id)->get();
        return view('profile', array('user' => Auth::user(), 'Events'=>$my) );
    }

    public function update_avatar(Request $request){
      //Handle the user upload of avatar
      $validator = Validator::make($request->all(), [
        'avatar' => 'mimes:jpeg,bmp,png'
      ]);

      if ($validator->fails()) {
        \Session::flash('warning', 'Please enter all the required details');
        return Redirect::to('/profile')->withInput()->withErrors($validator);
      }

      if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
      }

      return view('loggedIn', array('user' => Auth::user()));
    }
}
