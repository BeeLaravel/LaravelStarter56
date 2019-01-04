<?php
namespace App\Http\Controllers\Backend\Link;

use Illuminate\Http\Request;

class LinkController extends Controller {
    public function __construct() {
    }
    public function index() {
    	return view('backend.link.index');
    }
    public function show() {
    	return 'show';
    }
    public function edit() {
    	return 'edit';
    }
    public function update() {
    	return 'update';
    }
    public function create() {
    	return 'create';
    }
    public function delete() {
    	return 'delete';
    }
}
