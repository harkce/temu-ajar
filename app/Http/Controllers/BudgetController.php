<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;

class BudgetController extends MainController
{
    public function get() {
    	$budgets = Budget::all();
    	return $this->jsonResponse('success', null, $budgets);
    }
}
