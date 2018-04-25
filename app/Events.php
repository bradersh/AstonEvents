<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{

  public function user()
      {
          return $this->belongsTo('App\User', 'event_organiser');
      }

    protected $fillable = [
        'event_name', 'start_date', 'end_date', 'event_description', 'event_type', 'event_organiser', 'event_location', 'event_avatar',
    ];
}
