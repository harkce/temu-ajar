<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ThreadController extends MainController
{
    public function create(Request $request) {
    	$input = $request->all();
    	$thread = new Thread();
    	$thread->title = $input['title'];
    	$thread->subject = $input['subject'];
    	if (array_key_exists('additional', $input)) {
    		$thread->additional = $input['additional'];
    	}
    	$thread->time = date('Y-m-d H:i:s', strtotime($input['time']));
    	$thread->location = $input['location'];
    	$thread->student = $input['student'];
    	$thread->budget_range = $input['budget_range'];
    	$thread->user_id = $input['user_id'];
    	$thread->save();

    	$thread = Thread::with('budget')->find($thread->id);
    	$thread->time = date('D, j F Y', strtotime($thread->time));
    	return $this->jsonResponse('success', 'Success create thread', $thread);
    }
}
