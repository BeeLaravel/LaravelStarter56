<?php
namespace App\Http\Controllers\Project\Cases;

class IndexController extends Controller {
    public function index($flag='') {
    	$stars = category(1);
    	$departments = category(2);
    	$doctors = category(3); // 武汉医师

        return view('project.cases.index', compact('stars', 'departments', 'doctors', 'flag'));
    }
    public function edit($id) {
        $stars = category(1);
    	$departments = category(2);
    	$doctors = category(3); // 武汉医师

    	return view('project.cases.edit', compact('stars', 'departments', 'doctors', 'flag'));
    }
}
