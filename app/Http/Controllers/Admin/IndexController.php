<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index.index');
    }

    //头
    public function head()
    {
        return view('admin.index.head');
    }

    //坐左
    public function left()
    {
        return view('admin.index.left');
    }

    //图
    public function main()
    {
        return view('admin.index.main');
    }
}
