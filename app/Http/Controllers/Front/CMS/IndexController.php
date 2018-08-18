<?php

namespace App\Http\Controllers\Front\CMS;

use Illuminate\Http\Request;

use App\Models\CMS\Organization;
use App\Models\CMS\SettingValue;
use App\Models\CMS\Menu;
use App\Models\CMS\Post;
use App\Models\CMS\Tag;
use App\Models\CMS\Gallery;

class IndexController extends Controller
{
    protected $theme = 'default';
    protected $organization_id = 1;

    public function index(Request $request)
    {
        $organization = Organization::find($this->organization_id);
        $settings = SettingValue::where('organization_id', $this->organization_id)->pluck('value', 'key');
        $menus = Menu::where('organization_id', $this->organization_id)
            ->where('type', 'main')
            ->get(['title', 'icon', 'parent_id']);
        $middle_menus = Menu::where('organization_id', $this->organization_id)
            ->where('type', 'middle')
            ->get(['title', 'icon', 'parent_id']);
        $posts = Post::where('organization_id', $this->organization_id)
            ->where('category_id', 1)
            ->get(['title', 'id']);
        $tags = Tag::where('organization_id', $this->organization_id)
            ->where('category_id', 1)
            ->get(['title', 'id']);
        $galleries = Gallery::where('organization_id', $this->organization_id)
            ->where('category_id', 0)
            ->get(['title', 'path', 'id']);
        $slide_1 = Gallery::where('organization_id', $this->organization_id)
            ->where('category_id', 1)
            ->get(['title', 'path', 'id']);
        $slide_2 = Gallery::where('organization_id', $this->organization_id)
            ->where('category_id', 2)
            ->get(['title', 'path', 'id']);
        $slide_3 = Gallery::where('organization_id', $this->organization_id)
            ->where('category_id', 3)
            ->get(['title', 'path', 'id']);
        $slide_4 = Gallery::where('organization_id', $this->organization_id)
            ->where('category_id', 4)
            ->get(['title', 'path', 'id']);
        return view($this->view, compact('organization', 'settings', 'menus', 'middle_menus', 'posts', 'tags', 'galleries', 'slide_1', 'slide_2', 'slide_3', 'slide_4'));
    }
    public function category()
    {
        
    }
}
