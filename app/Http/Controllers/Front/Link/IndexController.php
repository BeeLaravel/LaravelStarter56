<?php
namespace App\Http\Controllers\Front\Link;

use Illuminate\Http\Request;

// use App\Models\CMS\Organization;

class IndexController extends Controller {
    public function index(Request $request) {
        $category_array = \App\Models\Structure\CategoryItem::where('category_id', 4)->get(); // 获取所有分类
        $categories = level_array($category_array);

        return view('front.link.index', compact('categories'));
    }
    public function category() {
        
    }
}
