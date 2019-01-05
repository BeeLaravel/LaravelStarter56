<?php
namespace App\Http\Controllers\Backend\Link;

use Illuminate\Http\Request;
use App\Models\User\Category;

class LinkController extends Controller {
    public function __construct() {
    }
    public function index() {
        $menus = Category::where('created_by', 0)
            ->where('type', 'hospital')
            ->get();

        $menus = level_array($menus);

    	return view('backend.link.index', compact('menus'));
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
    // public function test() {
    //     $post = new Post;
    //     $post
    //        ->setTranslation('name', 'en', 'hello')
    //        ->setTranslation('name', 'zh-CN', '你好')
    //        ->save();
           
    //     $post->name;
    //     $post->getTranslation('name', 'zh-CN');

    //     app()->setLocale('zh-CN');

    //     $post->name;
    // }
}
