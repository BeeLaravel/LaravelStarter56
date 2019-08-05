<?php
namespace App\Http\Controllers\Backend;

class Controller extends \App\Http\Controllers\Controller {
    public function __construct() {
    	$this->middleware('auth:backend');
    }
}
