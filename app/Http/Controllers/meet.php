<?php

namespace App\Http\Controllers;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

use Illuminate\Http\Request;

class meet extends Controller
{
    public function meet(){
        
    }
    public function redirect(){

    }
    public function createEvent()
    {
        $event = new Event;
        
        $event->name = 'اجتماع مهم';
        $event->startDateTime = Carbon::now();
        $event->endDateTime = Carbon::now()->addHour();
        
        $event->save();
        
        return response()->json(['event' => $event]);
    }
    public function listEvents()
    {
        $events = Event::get();
        
        return response()->json(['events' => $events]);
    }
    public function updateEvent($eventId)
    {
        $event = Event::find($eventId);

        $event->name = 'اجتماع محدث';
        $event->startDateTime = Carbon::now()->addDay();
        $event->endDateTime = Carbon::now()->addDay()->addHour();

        $event->save();

        return response()->json(['event' => $event]);
    }
}
