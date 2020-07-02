<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Navigation;
use App\Model\CateImg;
use App\Model\Category;
use App\Model\CateCont;

class IndexController extends Controller
{
    //主页
    public function index()
    {
        return view('index.index');
    }

    //导航栏
    public function navigation()
    {
        $res=Navigation::get()->toArray();
        return $res;
    }

    //服务指南图片
    public function fwznimg()
    {
        $res=CateImg::where(['know'=>1])->where(['is_del'=>1])->get();
        return $res;
    }

    //在线服务图片
    public function zxfwimg()
    {
        $res=CateImg::where(['know'=>2])->where(['is_del'=>1])->get();
        return $res;
    }

    public function cateName()
    {
        $res=Category::join('cate_contents','cate_contents.cate_id','=','category.cate_id')
                    ->where(['is_dels'=>1])->get()->toArray();
        return $res;
    }
}
