<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category as cate;


class Category extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function story(Request $request)
    {
        $data=$request->all();
        $a=[
            'cate_name'=>$data['cate_name'],
            'addtime'=>time(),
            'is_show'=>$data['is_show']
        ];
        $res=cate::insert($a);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0,
                'url'=>'/cate/index'
            ];
        }else{
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }

    public function index()
    {
        $name=request()->cate_name;
        $where=[];
        if($name){
            $where[]=['cate_name','like',"%$name%"];
        }
        $res=cate::where($where)->where(['is_del'=>1])->paginate(3);
        $query=request()->all();
        return view('admin.category.index',['data'=>$res,'query'=>$query]);
    }

    public function del(Request $request)
    {
        $id=$request->id;
        $count=cate::join('cate_contents','cate_contents.cate_id','=','category.cate_id')
                    ->where(['cate_contents.cate_id'=>$id])
                    ->count();
        if($count>0){
            return $arr=[
                'msg'=>'此分类有内容不能删',
                'code'=>12345
            ];
        }else{
            cate::where(['cate_id'=>$id])->update(['is_del'=>2]);
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }

    public function edit()
    {
        $id=request()->id;
        $res=cate::where(['cate_id'=>$id])->first();
        return view('admin.category.edit',['data'=>$res]);
    }

    public function upd()
    {
        $data=request()->except('_token');
        $res=cate::where(['cate_id'=>$data['cate_id']])->update($data);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0,
            ];
        }
    }

    public function isshow()
    {
        $data=request()->all();
        $res=cate::where(['cate_id'=>$data['cate_id']])->update([$data['field']=>$data['value']]);
        if($res){
            return 'ok';
        }
    }

}
