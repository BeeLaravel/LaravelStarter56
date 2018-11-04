<?php

namespace App\Http\Controllers\Office\Procedure;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Office\Controller
{
    public function __construct() {
    	$this->middleware('auth:admin');
    }
}
