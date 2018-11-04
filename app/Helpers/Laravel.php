<?php
// ## Laravel
use App\Models\System\Menu;
use App\Models\System\MenuItem;

// ### System
function route_class() {
    return str_replace('.', '-', Route::currentRouteName());
}

// ### 菜单
function menu($slug=1) {
	$menu = Menu::find($slug)->orWhere('slug', $slug);
	return $menu->items();
}