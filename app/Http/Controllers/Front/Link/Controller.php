<?php
namespace App\Http\Controllers\Front\Link;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Front\Controller {
    protected $view_perfix = 'front.link';

    // public function __construct(Request $request) {
    //     parent::__construct();

    //     $current_action = $request->route()->getActionName();
    //     $current_actions = explode('@', $current_action);
    //     $action_name = $current_actions[1];
    //     $this->view =  $this->view_perfix . "." . $this->theme . "." . $action_name;
    // }
}
