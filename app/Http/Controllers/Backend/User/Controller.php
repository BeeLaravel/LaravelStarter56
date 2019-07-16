<?php
namespace App\Http\Controllers\Backend\User;

class Controller extends \App\Http\Controllers\Backend\Controller {
	private $perfix = 'backend';
	protected $slug = '';

    public function __construct() {
    	if ( !$this->slug ) return new Exception();
    }

    protected function getUrl($action='index', $param=[]) {
        if ( is_array($action) ) {
            $param = $action;
            $action = '';
        } else if ( $action=='index' ) {
            $action = '';
        }

        return $this->perfix.'/'.$this->slug.'/'.$action.'?'.http_build_query($param);
    }
    protected function getView() {
    	$actions = explode('.', request()->route()->action['as']);
    	return $this->perfix.'.'.$this->slug.'.'.end($actions);
    }
    protected function getDefaultType() {
        return config('beesoft.'.$this->slug.'.default_type');
    }
}
