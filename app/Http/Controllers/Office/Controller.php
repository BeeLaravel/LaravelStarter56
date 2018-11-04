<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
    public function __construct() {
    	$this->middleware('auth:office');
    }
}
