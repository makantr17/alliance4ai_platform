<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\Registeration;
use App\Models\User;

class CalenderController extends Controller
{
    
    public function index(){
        $events = [];
        $discussion =  Discussion::latest()->get();
        
        if ($discussion -> count()) {
            foreach ($discussion as $source) {
                $events[] = [
                    'title' => $source-> title,
                    'start' => $source->date . " " . $source->start_time,
                    'end'   => $source->date . " " . $source->end_time,
                    'url'   => route('discussion.details', $source),
                ];
            }
        }
        return view('wp.calender', compact('events'));
    }

    public function filter(Request $request){
        $events = [];
        if ($request->category) {
            $discussion = Discussion::latest()->where('category', '=', $request->category)->latest()->get();
        }else {
            $discussion =  Discussion::latest()->get();
        }
        if ($discussion -> count()) {
            foreach ($discussion as $source) {
                $events[] = [
                    'title' => $source-> title,
                    'start' => $source->date . " " . $source->start_time,
                    'end'   => $source->date . " " . $source->end_time,
                    'url'   => route('discussion.details', $source),
                ];
            }
        }
        return view('wp.calender', compact('events'));
    }

    // My timeline
    public function mycalendar(Request $request, User $user){
        $events = [];
        $discussion = $user->registeration()->with(['discussion'])->get();
        
        if ($discussion -> count()) {
            foreach ($discussion as $source) {
                $events[] = [
                    'title' => $source-> discussion->title,
                    'start' => $source-> discussion->date . " " . $source->discussion->start_time,
                    'end'   => $source-> discussion->date . " " . $source->discussion->end_time,
                    'url'   => route('discussion.details', $source->discussion),
                ];
            }
        }
        return view('wp.calender', compact('events'));
    }
}
