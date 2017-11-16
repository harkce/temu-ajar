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

    public function edit(Request $request) {
    	$input = $request->all();
    	$thread = Thread::find($input['id']);
    	if (!$thread) {
    		return $this->jsonResponse('error', 'No thread found');
    	}
    	$thread->title = $input['title'];
    	$thread->subject = $input['subject'];
    	if (array_key_exists('additional', $input)) {
    		$thread->additional = $input['additional'];
    	}
    	$thread->time = date('Y-m-d H:i:s', strtotime($input['time']));
    	$thread->location = $input['location'];
    	$thread->student = $input['student'];
    	$thread->budget_range = $input['budget_range'];
    	$thread->save();

    	$thread = Thread::with('budget')->find($thread->id);
    	$thread->time = date('D, j F Y', strtotime($thread->time));
    	return $this->jsonResponse('success', 'Success update thread', $thread);
    }

    public function getAllByUser($id) {
    	$threads = Thread::where('user_id', $id)
	    	->join('budgets', 'threads.budget_range', '=', 'budgets.id')
	    	->get();
    	foreach ($threads as $thread) {
    		$thread->time = date('D, j F Y', strtotime($thread->time));
    	}
    	return $this->jsonResponse('success', null, $threads);
    }

    public function getAllExceptUser($id) {
    	$threads = Thread::where('user_id', '<>' ,$id)
	    	->join('budgets', 'threads.budget_range', '=', 'budgets.id')
	    	->get();
	    foreach ($threads as $thread) {
    		$thread->time = date('D, j F Y', strtotime($thread->time));
    	}
    	return $this->jsonResponse('success', null, $threads);
    }
}
