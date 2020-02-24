<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller{

	private $option = 'admin';

	public function index(Request $request){
		$op = $this->option;
		$subop = '';
		$opActive = 'admin';
		
		return view('admin.dashboard', compact('op', 'subop', 'opActive'));   
	}

}
