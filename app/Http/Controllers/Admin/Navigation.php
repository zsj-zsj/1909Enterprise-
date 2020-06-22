<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Navigation as n;

class Navigation extends Controller
{
    public function create()
    {
        return view('admin.navigation.create');
    }

    public function story(Request $request)
    {
        $data=$request->all();
        $arr=[
            'name'=>$data['name'],
            'hidden'=>$data['hidden'],
            'sort'=>$data['sort'],
            'time'=>time(),
            'url'=>$data['url']
        ];
        $res=n::insert($arr);
        if($res){
            return $resp=[
                'msg'=>'ok',
                'code'=>0,
                'url'=>'/navigation/index'
            ];
        }else{
            return $resp=[
                'msg'=>'添加失败',
                'code'=>1111
            ];
        }
    }

    public function index()
    {
        $name=request()->name;
        $where=[];
        if($name){
            $where[]=['name','like',"%$name%"];
        }
        $res=n::where($where)->where(['is_del'=>1])->orderBy('sort','desc')->paginate(3);
        $query=request()->all();
        return view('admin.navigation.index',['data'=>$res,'query'=>$query]);
    }

    public function del(Request $request)
    {
        $id=$request->id;
        $res=n::where(['id'=>$id])->update(['is_del'=>2]);
        if($res){
            return $arr=[
                'msg'=>'删除成功',
                'code'=>0
            ];
        }
    }

    public function edit()
    {
        $id=request()->id;
        $res=n::where(['id'=>$id])->first();
        return view('admin.navigation.edit',['data'=>$res]);
    }

    public function upd(Request $request)
    {
        $data=$request->except('_token');
        $res=n::where(['id'=>$data['id']])->update($data);
        if($res){
            return redirect('navigation/index');
        }
    }

    public function change(Request $request)
    {
        $data=$request->all();
        $res=n::where(['id'=>$data['id']])->update([$data['field']=>$data['value']]);
        if($res){
            return 'ok';
        }else{
            return 'no';
        }
    }

    public function changesort(Request $request)
    {
        $data=$request->all();
        $res=n::where(['id'=>$data['id']])->update(['sort'=>$data['sort']]);
        if($res){
            return $arr=[
                'msg'=>'ok',
                'code'=>0
            ];
        }
    }
}
