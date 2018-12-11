<?php
namespace App\Http\Controllers\Resource;

class Controller extends \App\Http\Controllers\Controller {
    public function __construct() {
    	$this->middleware('auth:resource');
    }
}
