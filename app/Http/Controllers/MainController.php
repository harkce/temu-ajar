<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    protected function jsonResponse($status, $message, $content, $code = 200) {
    	return response()
            ->json(['code' => $status,'message' => $message, 'content' => $content], $code)
            ->header('Content-Type', 'application/json');
    }
}
