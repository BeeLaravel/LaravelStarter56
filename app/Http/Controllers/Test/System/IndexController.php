<?php
namespace App\Http\Controllers\Test\System;

class IndexController extends Controller {
	public function index() {
		return 'test system index';
	}

	public function info() { // info ok
		$title = 'PHP 信息';

		ob_start(function($buffer) use ($title) {
			return '<title>'.$title.'</title>' . $buffer;
		});

		phpinfo();
		ob_end_flush();
	}
	public function version() { // version ok
		return phpversion();
	}
	public function extensions() { // extensions ok
		$data = get_loaded_extensions();

		$return_data = '<title>PHP 可用扩展</title>';
		$return_data .= '<style> td { border: 1px solid #f00; } </style>';
		$return_data .= '<table>';

		foreach ( $data as $key => $value ) {
			$return_data .= '<tr><td>'.($key+1).'</td><td>'.$value.'</td></tr>';
		}

		$return_data .= '</table>';

		return $return_data;
	}
	public function extension($extension='openssl') { // extension ok
		return $extension . " " . (extension_loaded($extension) ? '已启用' : '未启用');
	}
	public function classes() { // classes ok
		$data = get_declared_classes();

		$return_data = '<title>PHP 可用类</title>';
		$return_data .= '<style> td { border: 1px solid #f00; } </style>';
		$return_data .= '<table>';

		foreach ( $data as $key => $value ) {
			$return_data .= '<tr><td>'.($key+1).'</td><td>'.$value.'</td></tr>';
		}

		$return_data .= '</table>';

		return $return_data;
	}
	public function class($class='Exception') { // class ok
		return $class . " " . (class_exists($class) ? '可用' : '不可用');
	}
	public function class_methods($class='Exception') {
		return get_class_methods($class);
	}
	public function class_vars($class='Exception') {
		return get_class_vars($class);
	}
	public function functions($type='internal') { // functions ok
		$data = get_defined_functions();

		$return_data = '<title>PHP 可用函数</title>';
		$return_data .= '<style> td { border: 1px solid #f00; } </style>';
		$return_data .= '<table>';

		foreach ( $data[$type] as $key => $value ) {
			$return_data .= '<tr><td>'.($key+1).'</td><td>'.$value.'</td></tr>';
		}

		$return_data .= '</table>';

		return $return_data;
	}
	public function function($function='ob_start') { // function ok
		return $function . " " . (function_exists($function) ? '可用' : '不可用');
	}
}
