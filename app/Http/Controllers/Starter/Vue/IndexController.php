<?php

namespace App\Http\Controllers\Starter\Vue;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('starter.vue.index');
    }
}
