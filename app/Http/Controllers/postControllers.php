<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postControllers extends Controller
{
	public function create(){
		return view('pages.create');
	}
    
}
