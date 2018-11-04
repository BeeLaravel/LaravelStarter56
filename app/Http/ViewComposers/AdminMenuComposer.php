<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\System\Menu;

class AdminMenuComposer {
    protected $menu;

    public function __construct(Menu $menu) {
        $this->menu = $menu;
    }

    public function compose(View $view) {
        $view->with('menus', $this->menu->items());
    }
}
