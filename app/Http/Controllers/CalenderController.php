<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;

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
}
