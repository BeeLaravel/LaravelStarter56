<?php

namespace App\Http\Controllers\Starter\Element;

use App\Models\Blog\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('starter.element.index');
    }
}
