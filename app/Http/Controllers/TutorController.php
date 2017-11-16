<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;

class TutorController extends MainController
{
    public function becomeTutor(Request $request) {
    	$input = $request->all();
    	$user = User::find($input['id']);
    	if (!$user) {
    		return $this->jsonResponse('error', 'User not found');
    	}
    	$user->is_tutor = true;

    	$tutor = new Tutor();
    	$tutor->user_id = $user->id;
    	$tutor->skills = $input['skills'];

    	$tutor->save();
    	$user->save();
    	return $this->jsonResponse('success', 'Success become tutor');
    }
}
