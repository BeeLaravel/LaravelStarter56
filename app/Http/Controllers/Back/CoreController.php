<?php
namespace App\Http\Controllers\Back;

class CoreController extends Controller {
	public function index() {
		return view('back.index');
	}
	public function widgets() {
		return view('back.widgets');
	}
	public function charts() {
		return view('back.charts');
	}

	public function login() {
		$page_style = 1;

		return view('back.auth.login', compact('page_style'));
	}
	public function register() {
		$page_style = 1;

		return view('back.auth.register', compact('page_style'));
	}

	public function h500() {
		$page_style = 1;

		return view('back.http.500', compact('page_style'));
	}
	public function h404() {
		$page_style = 1;

		return view('back.http.404', compact('page_style'));
	}

	public function fontAwesome() {
		return view('back.icons.font-awesome');
	}
	public function simpleLineIcons() {
		return view('back.icons.simple-line-icons');
	}

	public function buttons() {
		return view('back.components.buttons');
	}
	public function socialButtons() {
		return view('back.components.social-buttons');
	}
	public function cards() {
		return view('back.components.cards');
	}
	public function forms() {
		return view('back.components.forms');
	}
	public function modals() {
		return view('back.components.modals');
	}
	public function switches() {
		return view('back.components.switches');
	}
	public function tables() {
		return view('back.components.tables');
	}
	public function tabs() {
		return view('back.components.tabs');
	}
}
