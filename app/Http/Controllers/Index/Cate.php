<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\CateCont;

class Cate extends Controller
{
    public function list()
    {
        return view('index.list2');
    }

    public function title()
    {
        $res=CateCont::get()->toArray();
        return $res;
    }

    public function info()
    {
        $id=request()->id;
        $data=CateCont::join('category','category.cate_id','=','cate_contents.cate_id')
                ->where(['id'=>$id])->first();
        // dd($res);
        return view('index.info2',['data'=>$data]);
    }

}
