<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends MainController
{
    public function register(Request $request) {
    	$input = $request->all();
    	$testUser = User::where('email', $input['email'])->first();
    	if ($testUser) {
    		return $this->jsonResponse('error', 'User already registered', null);
    	}
    	$user = new User();
    	$user->name = $input['name'];
    	$user->gender = $input['gender'];
    	$user->nim = $input['nim'];
    	$user->phone = $input['phone'];
    	$user->address = $input['address'];
    	$user->email = $input['email'];
    	$user->password = \Hash::make($input['password']);
    	try {
    		$user->save();
    	} catch (\ErrorException $e) {
    		return $this->jsonResponse('error', 'Please fill all field', null);
    	} catch (\Illuminate\Database\QueryException $e) {
    		return $this->jsonResponse('error', 'Please fill all field', null);
    	}
    	return $this->jsonResponse('success', 'Registration success', null);
    }
}
