<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Message extends Controller
{
    //前台
    public function index()
    {
        return view('index.liuyan');
    }


    //后台展示
    public function adminlist()
    {
        return view('admin.message.index');
    }
}