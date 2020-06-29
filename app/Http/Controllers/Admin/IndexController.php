<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Permission;

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

    //左
    public function left()
    {
        // $admin=session('user');
        // $perm = $admin['perm'];
        // $perm = createTree($perm);
        
        return view('admin.index.left');
    }

    //图
    public function main()
    {
        return view('admin.index.main');
    }
}
